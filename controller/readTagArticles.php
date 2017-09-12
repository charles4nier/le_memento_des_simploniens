<?php
  require "../../model/tagArticle.php";

  $tagArticles = tagArticle::getTagArticles();

  require "../../view/tagArticles/tagArticles.php";
