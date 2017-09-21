<?php
  require "sqlReq.php";

  class Tag {

   /**
    * getTags recovers all tags in the "tag" table
    * @return array including all the data coming from the targeted table
    */
   public static function getTags () {
     global $bdd;

     $db = $bdd->query('SELECT * FROM tag');
     if($db === false) {
        return $db;
     }
     return $db->fetchAll();
   }

   /**
    * createTag creates and stores an article into the targeted table
    * @param string $tag_name : the tag's name
    */

   public static function createTag ($tag_name) {
     global $bdd;

     $req =  $bdd->prepare('INSERT INTO tag (tag_name) VALUES (:tag_name)');

     $req->execute(array(
       'tag_name' => $tag_name
     ));
   }
 }
