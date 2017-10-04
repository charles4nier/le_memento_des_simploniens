<?php
  require "sqlReq.php";


 class Article {

   /**
    * getArticles recovers all articles in the "article" table
    * @return array including all the data coming from the targeted table
    */
   public static function getArticles () {
     global $bdd;

    //  $db = $bdd->query('SELECT * FROM article ORDER BY id_article DESC');
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
    public static function deleteArticle ($id_article) {
     global $bdd;

      if(gettype($id_article) != 'integer' && $id_article != '0') {
        $req =  $bdd->prepare('DELETE FROM article WHERE id_article = :id_article');

        return $req->execute(array(
          'id_article' => $id_article
        ));
      }

       return false;
    }

   /**
    * createArticle creates and stores an article into the targeted table
    * @param string $content : The article content
    * @param string $link : A way to explain the article's content by linking a * website or giving a code example
    */
   public static function createArticle ($title, $content, $link) {
     global $bdd;

     $req =  $bdd->prepare('INSERT INTO article (title, content, link) VALUES (:title, :content, :link)');

     $req->execute(array(
       'title' => $title,
       'content' => $content,
       'link' => $link
     ));
   }

   /**
    * editArticle edits an article from the targeted table
    *
    * @param number $id_article : Input article's id
    * @param string $content : The article content
    * @param string $link : A way to explain the article's content by linking a * website or giving a code example
    */
   public static function editArticle ($title, $content, $link, $id_article) {
     global $bdd;

     $req = $bdd->prepare('UPDATE article SET title = :nvxTitle, content = :nvxContent, link = :nvxLink WHERE id_article = :id_article');

     $req->execute(array(
       'nvxTitle' => $title,
       'nvxContent' => $content,
       'nvxLink' => $link,
       'id_article' => $id_article
     ));
   }
 }
