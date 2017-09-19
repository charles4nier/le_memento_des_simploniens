let tagName = "";
let app = angular.module("myApp", []);

app.controller("accessDataBaseArticle", function($scope, $http) {

  // document.querySelector('main').addEventListener('click', function(event) {
  //     if(event.target.classList.contains('tagContainer')) {
  //       if(event.target.childNodes[3].hasAttribute('checked')) {
  //         event.target.classList.remove('checked');
  //         event.target.childNodes[3].removeAttribute('checked');
  //       } else {
  //         event.target.childNodes[3].setAttribute('checked', 'true ');
  //         event.target.classList.add('checked');
  //       }
  //     }
  //     // event.target.classList.add('checked');
  // });

  $scope.show = true;
  $scope.showTags = false;
  $scope.showTagArticles = false;
  $scope.showCreateForm = false;
  $scope.showEditForm = false;
  $scope.showAddTags = true;


  $scope.showArticle = function() {
    $scope.show = true;
    $scope.showTags = false;
    $scope.showTagArticles = false;
    $scope.showCreateForm = false;
    $scope.showEditForm = false;
  }

  $scope.displayCreateForm = function () {
    $scope.show = false;
    $scope.showTags = false;
    $scope.showTagArticles = false;
    $scope.showCreateForm = true;
    $scope.showEditForm = false;

    $http.get("tags/index.php")
    .then(function(response) {
      $scope.tags = response.data.tags;
      $scope.tagsLength = $scope.tags.length;
      // for(let i = 0; i < tagContainers.length; i++) {
      //   tagContainers[i].addEventListener('click', function() {
      //     alert('bonjour');
      //   });
      // }
    });
  }

  $scope.displayEditForm = function () {
    $scope.show = false;
    $scope.showTags = false;
    $scope.showTagArticles = false;
    $scope.showCreateForm = false;
    $scope.showEditForm = true;
  }

  $scope.loadArticles = function ($event) {

    $http.get("articles/index.php")
    .then(function(response) {

      // récupération de la base de donnée
      $scope.articles = response.data.articles;

      // création de length, qui me permet de retrouver l'index de la page voulu (par défaut, le dernier article du blog sera affiché).
      $scope.length = $scope.articles.length - 1;

      // navigation dans le blog avec les boutons before et after
      $scope.before = function() {
        if($scope.length >= 1) {
          $scope.length--;
        }
      }

      $scope.after = function() {
        if( ($scope.length + 1) < $scope.articles.length)
        {
          $scope.length++;
        }
      }

      // navigation depuis les différentes menu de navigation
      $scope.getIndex = function ($event) {
        // récupération du titre de l'article au click
        let title = $event.currentTarget.textContent;

        //comparaison du titre avec les titres contenu dans mon tableau "articles". Une fois qu'un titre correspond, on récupère la valeur de i et on l'affect à scope.length, qui me permet d'afficher la page concernée.
        for(let i = 0; i < $scope.articles.length; i++) {
          if($scope.articles[i].title == title) {
            $scope.length = i;
          }
        }
      }

      $scope.getTitle = function ($event) {
        // récupération du titre de l'article au click
        let title = $event.currentTarget.getAttribute("data-title");

        //comparaison du titre avec les titres contenu dans mon tableau "articles". Une fois qu'un titre correspond, on récupère la valeur de i et on l'affect à scope.length, qui me permet d'afficher la page concernée.
        for(let i = 0; i < $scope.articles.length; i++) {
          if($scope.articles[i].title == title) {
            $scope.length = i;
            $scope.showArticle();
          }
        }
      }
    });
  }

  $scope.displayTag = function () {
    $scope.show = false;
    $scope.showTags = true;
    $scope.showTagArticles = false;
    $scope.showCreateForm = false;
    $scope.showEditForm = false;

    $http.get("tags/index.php")
    .then(function(response) {
      $scope.tags = response.data.tags;
    });
  }

  $scope.dataTagArticles = [];

  $scope.displayTagArticles = function ($event) {
      tagName = $event.currentTarget.textContent;
      $http.get("tagArticles/index.php")
      .then(function(response) {
        $scope.tagArticles = response.data.tagArticles;
        if(tagName.length > 0 ) {
          $scope.dataTagArticles = [];
          for(let i = 0; i < $scope.tagArticles.length; i++) {
            if(tagName === $scope.tagArticles[i].tag_article_name) {
              $scope.dataTagArticles.push($scope.tagArticles[i]);
            }
          }

        }
        $scope.show = false;
        $scope.showTags = false;
        $scope.showTagArticles = true;
        $scope.showCreateForm = false;
        $scope.showEditForm = false;
    });
  }

  // $scope.check = function ($event) {
  //   if($event.target.childNodes[3].hasAttribute('checked')) {
  //     $event.target.classList.remove('checked');
  //     $event.target.childNodes[3].removeAttribute('checked');
  //   } else {
  //     $event.target.childNodes[3].setAttribute('checked', 'true ');
  //     $event.target.classList.add('checked');
  //   }
  // }

  $scope.showAddTagInput = function () {
    $scope.showAddTags = false;
    document.getElementById('addTagInput').classList.add('isVisible');
  }


  $scope.displayValidate = function ($event) {
    tagName = $event.target.value;
    if(tagName.length > 0 ) {
      document.getElementById('validAddTag').classList.add('add');
    } else {
      document.getElementById('validAddTag').classList.remove('add');
    }
  }


  $scope.pushTag = function ($event) {
    if($event.target.classList.contains('add')) {
      let countTags = document.getElementsByClassName('tags').length;
      let tagContent = document.getElementById('addTagInput').value;

      let newTagContainer = document.createElement('div');
      newTagContainer.id = 'tagContainer'+ (countTags + 1);
      newTagContainer.classList.add('tagContainer', 'ng-scope');
      newTagContainer.setAttribute('ng-click', "check($event)");

      let newLabel = document.createElement('label');
      newLabel.setAttribute('for', (countTags + 1));
      let newLabelContent = document.createTextNode(tagContent);

      let newCheckbox = document.createElement('input');
      newCheckbox.classList.add('tags');
      newCheckbox.type = "checkbox";
      newCheckbox.name = countTags + 1;
      newCheckbox.value = tagContent;

      let newHiddenInput = document.createElement('input');
      newHiddenInput.type = "hidden";
      newHiddenInput.name = "idTag" + (countTags + 1);
      newHiddenInput.value = countTags + 1;

      newLabel.appendChild(newLabelContent);
      newTagContainer.insertAdjacentElement('beforeend', newLabel);
      newTagContainer.insertAdjacentElement('beforeend', newCheckbox);
      newTagContainer.insertAdjacentElement('beforeend', newHiddenInput);
      document.getElementById('tagsContainer').insertAdjacentElement('beforeend',newTagContainer);

      document.getElementById('addTagInput').value = "";
      document.getElementById('validAddTag').classList.remove('add');

      countTags = document.getElementsByClassName('tags').length;
      document.getElementById('countTags').value = countTags;
      console.log(document.getElementById('countTags').value);
    }
  }

  $scope.loadArticles();
});

// document.getElement.addEventListener('click', function (event) {
//   if(event.target.hasClass('tagsContainer')) {
//     alert('bonjour');
//   }
// })
