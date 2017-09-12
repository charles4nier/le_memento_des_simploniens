<?php
  require "sqlReq.php";

  class tagArticle {

   /**
    * getTags recovers all tags and titles in the "tag article" table
    * @return array including all the data coming from the targeted table
    */
   public static function getTagArticles () {
     global $bdd;

     $db = $bdd->query('SELECT article.title, tag.tag_name FROM article INNER JOIN tag_article ON article.id_article = tag_article.id_article INNER JOIN tag ON tag.id_tag = tag_article.id_tag');

     if($db === false) {
        return $db;
     }
     return $db->fetchAll();
   }
 }
