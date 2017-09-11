<!-- <?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Le mémento des Simploniens</title>
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/filter.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script type="text/javascript" src="js/controller.js"></script>
  </head>
  <body ng-app="myApp" ng-controller="accessDataBaseArticle">
    </div>
    <header class="container-fluid">
      <div class="row blackHeader">
        <div class="col-md-3 col-sm-12 flexColumn justifyCenter"><a href="" ng-click="!showTags"><button type="button" name="button" class="btn btn-primary">Retour à l'accueil</button></a></div>
        <h1 class="col-md-6 col-sm-12">Ressources utiles</h1>
        <div class="col-md-3 col-sm-12 flexColumn justifyCenter text-right">
          <?php
            if($adminConnected) {
          ?>
          <a class="col-xs-12"  href="../public/session/unset.php"><button type="button" name="button" class="btn btn-primary">Se déconnecter</button></a>
          <?php
            }
          ?>
        </div>
      </div>
    </header> -->
    <main n-app="myApp" ng-controller="accessDataBaseTag">
      <nav class="tag_nav">
        <p class="perfectCenter" ng-repeat="tag in tags"><a class="perfectCenter" href="tags/test.php?id_tag={{tag.id_tag}}">{{tag.tag_name}}</a></p>
      </nav>
    </main>
