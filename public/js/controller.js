let tagName = "";
let app = angular.module("myApp", []);

app.controller("accessDataBaseArticle", function($scope, $http) {
  // Initialisation des différentes varianles permettant l'affichage
  $scope.show = true;
  $scope.showTags = false;
  $scope.showTagArticles = false;
  $scope.showCreateForm = false;
  $scope.showEditForm = false;
  $scope.showAddTags = true;

  // la fonction showArticle affiche la page d'article
  $scope.showArticle = function() {
    $scope.show = true;
    $scope.showTags = false;
    $scope.showTagArticles = false;
    $scope.showCreateForm = false;
    $scope.showEditForm = false;
  }

  // la fonction displayCreateForm affiche le formulaire de création d'articles
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
    });

  }

  // la fonction displayEditForm affiche le formulaire d'édition
  $scope.displayEditForm = function () {
    $scope.show = false;
    $scope.showTags = false;
    $scope.showTagArticles = false;
    $scope.showCreateForm = false;
    $scope.showEditForm = true;
  }

  // charge les articles
  $scope.loadArticles = function ($event) {

    $http.get("articles/index.php")
    .then(function(response) {

      // récupération de la base de donnée
      $scope.articles = response.data.articles;

      // création de length, qui me permet de retrouver l'index de la page voulu (par défaut, le dernier article du blog sera affiché (la récupération des articles depuis la base de données se fait par ordre décroissant)).
      $scope.length = 0;

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

  // affiche les tags
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

  // affiche les tagArticles
  $scope.displayTagArticles = function ($event) {
      //récupération du texte provenant de la carte cliquée
      tagName = $event.currentTarget.textContent;
      $http.get("tagArticles/index.php")
      .then(function(response) {
        $scope.tagArticles = response.data.tagArticles;
        //si tagName n'est pas vide
        if(tagName.length > 0 ) {
          //, on remplit $scope.dataTagArticles
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

  // permet de check les inputs du formulaire de création d'article
  $scope.check = function ($event) {
    if($event.target.childNodes[3].hasAttribute('checked')) {
      $event.target.classList.remove('checked');
      $event.target.childNodes[3].removeAttribute('checked');
    } else {
      $event.target.childNodes[3].setAttribute('checked', 'true');
      $event.target.classList.add('checked');
    }
  }

  // la function showAddTagInput affiche l'input permettant de saisir le nom d'un  nouveau tag
  $scope.showAddTagInput = function () {
    $scope.showAddTags = false;
    document.getElementById('addTagInput').classList.add('isVisible');
  }

  // la function displayValidate ajoute le bouton d'ajout de tag
  $scope.displayValidate = function ($event) {
    tagName = $event.target.value;
    if(tagName.length > 0 ) {
      document.getElementById('validAddTag').classList.add('add');
    } else {
      document.getElementById('validAddTag').classList.remove('add');
    }
  }

  // la function pushTag permet d'ajouter des tags dans le formulaire de création d 'articles
  $scope.pushTag = function ($event) {
    let tagContent = document.getElementById('addTagInput').value;
    let countTags = document.getElementsByClassName('tags').length + 1

    if(tagContent.length > 0) {
      $scope.tags.push({tag_name: tagContent, id_tag: countTags});
      document.getElementById('addTagInput').value = "";
      document.getElementById('validAddTag').classList.remove('add');
      $scope.tagsLength = $scope.tagsLength + 1;
    } else {
      alert('Vous devez remplir le champ avant de valider');
    }
  }

  $scope.loadArticles();
});
