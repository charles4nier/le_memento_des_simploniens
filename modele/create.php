<?php

session_start();

$title = $_POST['title'];
$type = $_POST['type'];
$content = $_POST['content'];
$demo = $_POST['demo'];

require 'sqlReq.php';

$req =  $bdd->prepare('INSERT INTO article (title, type, content, demo) VALUES (:title, :type, :content, :demo)');

$req->execute(array(
  'title' => $title,
  'type' => $type,
  'content' => $content,
  'demo' => $demo
));

header('Location: http://localhost/portfolio_angularJs/index.php');
