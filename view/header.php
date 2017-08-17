<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Charles FOURNIER - Le Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/filter.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script type="text/javascript" src="js/controller.js"></script>
  </head>
  <body ng-app="myApp" ng-controller="accessDataBase">
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
        <h1 class="col-md-offset-4 col-md-4 col-sm-12">Charles<span>4</span>nier's Blog</h1>
        <div class=" col-md-4 col-sm-12 flexColumn justifyCenter text-right">
          <?php
            if($adminConnected) {
          ?>
          <a class="col-xs-12"  href="unset.php"><button type="button" name="button" class="btn btn-primary">Se déconnecter</button></a>
          <a class="col-xs-12" href=""><button type="button" name="button" class="btn btn-primary" ng-click="show = !show" ng-hide="showEditForm">Nouvel article</button></a>

          <a href=""><button type="button" name="button" class="btn btn-primary" ng-click="showEditForm = !showEditForm" ng-hide="!showEditForm">Retour à l'accueil</button></a>
          <?php
            } else {
          ?>
            <a class="col-xs-12 connexion" href="#openModal"><button type="button" name="button" class="btn btn-primary">Se connecter</button></a>
          <?php
            }
          ?>
        </div>
      </div>
      <nav class="row" ng-show="!show" ng-hide="showEditForm">
        <ul class="flexRow flexWrap justifyFlexStart">
          <li class="parent">CSS
            <ul>
              <li ng-repeat="article in articles | filter : 'CSS'" ng-click="getIndex($event)">{{article.title}}</li>
            </ul>
          </li>
          <li class="parent">JS
            <ul>
              <li ng-repeat="article in articles | filter : 'JS'"  ng-click="getIndex($event)">{{article.title}}</li>
            </ul>
          </li>
          <li class="parent">PHP
            <ul>
              <li ng-repeat="article in articles | filter : 'PHP'"  ng-click="getIndex($event)">{{article.title}}</li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
