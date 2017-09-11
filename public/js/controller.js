let app = angular.module("myApp", []);

app.controller("accessDataBaseArticle", function($scope, $http) {

  $scope.show = false;
  $scope.showTags = false;

  $scope.showArticle = function() {
    $scope.show = true;
    $scope.showTags = false;
  }

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

  });
});

app.controller("accessDataBaseTag", function($scope, $http) {
  $http.get("tags/index.php")
  .then(function(response) {
    console.log(response.data.tags[0]);

    $scope.tags = response.data.tags;
  });
});
