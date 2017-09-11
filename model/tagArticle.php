<?php
  require "sqlReq.php";

  class tagArticle {

   /**
    * getTags recovers all tags in the "tag" table
    * @return array including all the data coming from the targeted table
    */
   public static function getTagArticle ($id_tag) {
     global $bdd;

     $db = $bdd->query('SELECT * FROM tag_article WHERE id_tag =' .$id_tag);
     if($db === false) {
        return $db;
     }
     return $db->fetchAll();
   }
 }
