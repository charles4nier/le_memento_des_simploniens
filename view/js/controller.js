let app = angular.module("myApp", []);

app.controller("accessDataBase", function($scope, $http) {
  $http.get("../modele/req.php")
  .then(function(response) {
    $scope.articles = response.data.articles;
  });
});
