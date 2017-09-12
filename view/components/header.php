<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Le mémento des Simploniens</title>
    <link rel="stylesheet" href="css/blog.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script type="text/javascript" src="js/controller.js"></script>
  </head>
  <body ng-app="myApp" ng-controller="accessDataBaseArticle">
    <div class="modalContent" id="openModal">
      <form class="myModal flexColumn perfectCenter" action="index.php" method="post">
        <p>Se connecter</p>
        <input type="text" name="login" value="" placeholder="login">
        <input type="password" name="password" value="" placeholder="password">
        <input type="submit" name="submit" value="connection">
        <a href="index.php">close</a>
      </form>
    </div>
    <header class="container-fluid">
      <div class="row blackHeader">
        <div class="col-md-3 col-sm-12 flexColumn justifyCenter">
          <button ng-show="show" ng-click="displayTag()" type="button" name="button" class="btn btn-primary">Articles par tags</button>

          <button ng-show="!show" ng-click="showArticle()" type="button" name="button" class="btn btn-primary">Retour à l'accueil</button>
        </div>

        <h1 class="col-md-6 col-sm-12">Ressources utiles</h1>
        <div class="col-md-3 col-sm-12 flexColumn justifyCenter text-right">
          <?php
            if($adminConnected) {
          ?>
          <a class="col-xs-12"  href="../public/session/unset.php"><button type="button" name="button" class="btn btn-primary">Se déconnecter</button></a>
          <a class="col-xs-12" href=""><button type="button" name="button" class="btn btn-primary" ng-click="displayCreateForm()">Nouvel article</button></a>
          <?php
            } else {
          ?>
            <a class="col-xs-12 connexion" href="#openModal"><button type="button" name="button" class="btn btn-primary">Se connecter</button></a>
          <?php
            }
          ?>
        </div>
      </div>
    </header>
