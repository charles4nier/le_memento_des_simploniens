<?php
  require "sqlReq.php";


 class Article {

   /**
    * getArticles recovers all articles in the "article" table
    *
    * @return array including all the data coming from the targeted table
    */
   public static function getArticles () {
     global $bdd;

     $db = $bdd->query('SELECT * FROM article');
     if($db === false) {
        return $db;
     }
     return $db->fetchAll();
   }

   /**
    * deleteArticle deletes an article from the targeted table
    *
    * @param string $id : Input article's id
    */
    public static function deleteArticle ($id) {
     global $bdd;

      if(gettype($id) != 'integer' && $id != '0') {
        $req =  $bdd->prepare('DELETE FROM article WHERE id = :id');

        return $req->execute(array(
          'id' => $id
        ));
      }

       return false;
    }

   /**
    * createArticle creates and stores an article into the targeted table
    *
    * @param number $id : Input article's id
    * @param string $type : Typifys the content (Js, Php, Css, Html)
    * @param string $content : The article content
    * @param string $demo : A way to explain the article's content by linking a * website or giving a code example
    */
   public static function createArticle ($title, $type, $content, $demo) {
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
    * editArticle edits an article from the targeted table
    *
    * @param number $id : Input article's id
    * @param string $type : Typifys the content (Js, Php, Css, Html)
    * @param string $content : The article content
    * @param string $demo : A way to explain the article's content by linking a * website or giving a code example
    */
   public static function editArticle ($type, $title, $content, $demo, $id) {
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
 }
