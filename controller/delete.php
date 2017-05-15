<?php

require 'issetPost.php';

require '../modele/sqlReq.php';

if(isset($_GET['supprimer'])) {

$id = $_GET['supprimer'];

$req =  $bdd->prepare('DELETE FROM article WHERE id = :id');

$req->execute(array(
  'id' => $id
));

}

header('Location: http://localhost/portfolio_angularJs/controller/index.php');
