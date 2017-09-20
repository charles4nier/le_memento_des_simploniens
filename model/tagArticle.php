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

   /**
    * createTagArticle creates and stores an article into the targeted table
    * @param string $id_tag : the tag's id
    * @param string $tag_name : the tag's name
    */

   public static function createTagArticle ($id_article, $id_tag) {
     global $bdd;

     $req =  $bdd->prepare('INSERT INTO tag_article (id_article, id_tag) VALUES (:id_article, :id_tag)');

     $req->execute(array(
       'id_article' => $id_article,
       'id_tag' => $id_tag
     ));
   }

   /**
    * deleteTagArticle deletes an article from the targeted table
    *
    * @param string $id_article : Input article's id
    */
    public static function deleteTagArticle ($id_article) {
     global $bdd;

      if(gettype($id_article) != 'integer' && $id_article != '0') {
        $req =  $bdd->prepare('DELETE FROM tag_article WHERE id_article = :id_article');

        return $req->execute(array(
          'id_article' => $id_article
        ));
      }

       return false;
    }
 }
