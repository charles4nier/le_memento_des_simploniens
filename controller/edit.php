<?php

require 'issetPost.php';

require '../modele/sqlReq.php';

$req = $bdd->prepare('UPDATE article SET type = :nvxType, title = :nvxTitle, content = :nvxContent, demo = :nvxDemo WHERE id = :id');

$req->execute(array(
  'nvxType' => $type,
  'nvxTitle' => $title,
  'nvxContent' => $content,
  'nvxDemo' => $demo,
  'id' => $id
));

header('Location: http://localhost/portfolio_angularJs/controller/index.php');
