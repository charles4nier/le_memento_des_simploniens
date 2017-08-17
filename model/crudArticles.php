<?php
require "sqlReq.php";

function getArticles () {
  global $bdd;

  $db = $bdd->query('SELECT * FROM article');
  return $db->fetchAll();
}

function deleteArticle ($id) {
  global $bdd;

  $req =  $bdd->prepare('DELETE FROM article WHERE id = :id');

  $req->execute(array(
    'id' => $id
  ));
}

function createArticle ($title, $type, $content, $demo) {
  global $bdd;

  $req =  $bdd->prepare('INSERT INTO article (title, type, content, demo) VALUES (:title, :type, :content, :demo)');

  $req->execute(array(
    'title' => $title,
    'type' => $type,
    'content' => $content,
    'demo' => $demo
  ));
}

function editArticle ($type, $title, $content, $demo, $id) {
  global $bdd;

  $req = $bdd->prepare('UPDATE article SET type = :nvxType, title = :nvxTitle, content = :nvxContent, demo = :nvxDemo WHERE id = :id');

  $req->execute(array(
    'nvxType' => $type,
    'nvxTitle' => $title,
    'nvxContent' => $content,
    'nvxDemo' => $demo,
    'id' => $id
  ));
}
