let tagName = "";
let app = angular.module("myApp", []);

app.controller("accessDataBaseArticle", function($scope, $http) {

  $scope.show = true;
  $scope.showTags = false;
  $scope.showTagArticles = false;
  $scope.showCreateForm = false;
  $scope.showEditForm = false;


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

  $scope.loadArticles();

});

// app.controller("accessDataBaseTag", function($scope, $http) {
//   $http.get("tags/index.php")
//   .then(function(response) {
//     $scope.tags = response.data.tags;
//
//     $scope.getTagName = function ($event) {
//       // récupération du titre de l'article au click
//       tagName = $event.currentTarget.textContent;
//       showTagArticles = true;
//     }
//   });
// });



app.controller("accessDataBaseTagArticle", function($scope, $http) {
  $http.get("tagArticles/index.php")
  .then(function(response) {
    $scope.displayTagArticles = [];
    $scope.tagArticles = response.data.tagArticles;
    window.addEventListener('click', function() {
      if(tagName.length > 0 ) {
        $scope.displayTagArticles = [];
        for(let i = 0; i < $scope.tagArticles.length; i++) {
          if(tagName === $scope.tagArticles[i].tag_article_name) {
            $scope.displayTagArticles.push($scope.tagArticles[i]);
          }
        }

      showTagArticles = false;
      $scope.showTagArticles = showTagArticles;
      return $scope.displayTagArticles;
      }
    });

  });
});

// window.addEventListener('click', function() {
//   if(tagName.length > 0 ) {
//     console.log(tagName);
//   }
// });
