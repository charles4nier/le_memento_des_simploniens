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
 }
