<?php

require 'issetPost.php';

require '../modele/sqlReq.php';

$req =  $bdd->prepare('INSERT INTO article (title, type, content, demo) VALUES (:title, :type, :content, :demo)');

$req->execute(array(
  'title' => $title,
  'type' => $type,
  'content' => $content,
  'demo' => $demo
));

header('Location: http://localhost/portfolio_angularJs/controller/index.php');