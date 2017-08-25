<?php
  require "../../model/Article.php";

  $articles = Article::getArticles();

  require "../../view/articles/JSON.php";
