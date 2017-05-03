
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>create article</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/filter.css">
    <link rel="stylesheet" href="css/animate.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  </head>
  <body class="flexColumn" ng-app="myApp" ng-controller="accessDataBase">
    <header class="flexRow flexWrap justifySpaceAround alignItemsCenter" >
      <a href="../index.php"><button type="button" name="button" class="btn btn-primary">Accueil</button></a>
    </header>
    <main class="flexColumn perfectCenter">
      <form class="flexColumn perfectCenter" action="../modele/create.php" method="post">
        <label for="type">type :</label>
        <input type="text" name="type" value="">

        <label for="title">Title :</label>
        <input type="text" name="title" value="">

        <label for="content">Content :</label>
        <textarea name="content" rows="8" cols="80"></textarea>

        <label for="demo">Demo :</label>
        <input type="text" name="demo" value="">

        <input type="submit" name="submit" value="Envoyer">
      </form>
    </main>
  </body>
</html>
