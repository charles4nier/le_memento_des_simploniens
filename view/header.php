<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Charles FOURNIER - Le Lab</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../view/css/blog.css">
    <link rel="stylesheet" href="../view/css/filter.css">
    <link rel="stylesheet" href="../view/css/animate.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script type="text/javascript" src="../view/js/controller.js"></script>
  </head>
  <body class="flexColumn" ng-app="myApp" ng-controller="accessDataBase">

    <header class="flexRow flexWrap justifySpaceAround alignItemsCenter" >
      <h1>Le lab !</h1>
      <?php
        if($adminConnected) {
      ?>
      <a href="unset.php"><button type="button" name="button" class="btn btn-primary">Se déconnecter</button></a>
      <a href=""><button type="button" name="button" class="btn btn-primary" ng-click="show = !show" ng-hide="showEditForm">Nouvel article</button></a>

      <a href=""><button type="button" name="button" class="btn btn-primary" ng-click="showEditForm = !showEditForm" ng-hide="!showEditForm">Retour à l'accueil</button></a>
      <?php
        } else {
      ?>
        <a href="#openModal"><button type="button" name="button" class="btn btn-primary">Se connecter</button></a>
      <?php
        }
      ?>

      <nav class="flexBasis100 flexRow flexWrap perfectCenter" ng-show="!show" ng-hide="showEditForm">
        <ul class="flexRow flexWrap">
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
