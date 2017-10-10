<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Le mémento des Simploniens</title>
    <link rel="stylesheet" href="css/blog.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script type="text/javascript" src="js/controller.js"></script>
  </head>
  <body ng-app="myApp" ng-controller="accessDataBaseArticle">
    <div class="modalContent" id="openModal">
      <form ng-show="displayUserConnect" class="myModal flexColumn perfectCenter" action="index.php" method="post">
        <p ng-click="displayAddUserFunction()">Nouvel utilisateur</p>
        <input type="text" name="login" value="" placeholder="login">
        <input type="password" name="password" value="" placeholder="password">
        <input type="submit" name="submit" value="Se connecter">
        <a href="index.php"> <i class="material-icons">close</i></a>
      </form>
      <form ng-show="displayAddUser" class="myModal flexColumn perfectCenter" action="../public/user/addUser.php" method="post">
        <label for="addLogin"> Veuillez renseigner votre login :</label>
        <input type="text" name="addLogin" value="" placeholder="login">
        <label for="addPassword"> Veuillez renseigner votre mot de passe :</label>
        <input type="password" name="addPassword" value="" placeholder="password">
        <input type="hidden" name="addRole" value="user">
        <input type="submit" name="submit" value="S'enregistrer">
        <a href="index.php"><i class="material-icons">close</i></a>
      </form>
    </div>
    <header class="container-fluid">
      <div class="row blackHeader">
        <h1 class="col-md-4 col-sm-12" ng-click="showArticle()"><img src="image/logo.png" width="40px" alt="">Le mémento des simploniens</h1>
        <nav class="col-md-offset-4 col-md-3 col-sm-12 flexRow justifyCenter text-right">
          <i ng-click="displayTag()" class="material-icons">search</i>
          <?php
            if($adminConnected) {
          ?>
          <i class="material-icons" ng-click="displayCreateForm()">add</i>
          <a class="col-xs-12 connexion"  href="../public/session/unset.php">Se déconnecter</a>
          <?php
            } else {
          ?>
            <a class="col-xs-12 connexion" href="#openModal" ng-click="displayUserConnectFunction()">Se connecter</a>
          <?php
            }
          ?>
        </nav>
      </div>
</header>
