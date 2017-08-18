<?php
require "sqlReq.php";

      /**
       * Récupère tous les articles de la table "article" dans la base de données * * portfolio_db.
       *
       * @return array Un tableau contenant toutes les lignes de la table ciblée
       */
function getArticles () {
  global $bdd;

  $db = $bdd->query('SELECT * FROM article');
  return $db->fetchAll();
}

        /**
         * Efface un article de la table article
         *
         * @param number $id L'identifiant d'une entrée
         */
function deleteArticle ($id) {
  global $bdd;

  $req =  $bdd->prepare('DELETE FROM article WHERE id = :id');

  $req->execute(array(
    'id' => $id
  ));
}

        /**
         * Créer un article dans la table "article"
         *
         * @param number $id L'identifiant d'une entrée
         * @param string $type Le type de contenu caractérisé par le langage attendu (Js, Php, Css, Html)
         * @param string $content Le contenu de l'article
         * @param string $demo Tout contenu ayant pour but d'expliciter le contenu de l'article
         */
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

        /**
         * Edit un article dans la table "article"
         *
         * @param number $id L'identifiant d'une entrée
         * @param string $type Le type de contenu caractérisé par le langage attendu (Js, Php, Css, Html)
         * @param string $content Le contenu de l'article
         * @param string $demo Tout contenu ayant pour but d'expliciter le contenu de l'article
         */
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
