<?php
  require '../../controller/issetPost.php';
  require '../../model/Article.php';

  Article::editArticle($title, $content, $link, $id_article);

  //local
  header('Location: http://localhost/le_memento_des_simploniens/public/index.php');

  //en ligne
  // header('Location: http://charles4nier.com/memento/public/index.php');
