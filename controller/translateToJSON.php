<?php
require "../modele/crudArticles.php";

$articles = getArticles();

require "../view/articles/JSON.php";
