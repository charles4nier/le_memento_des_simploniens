let app = angular.module("myApp", []);

app.controller("accessDataBase", function($scope, $http) {
  $http.get("../modele/req.php")
  .then(function(response) {
    $scope.articles = response.data.articles;

    $scope.length = $scope.articles.length - 1;

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

  });
});
