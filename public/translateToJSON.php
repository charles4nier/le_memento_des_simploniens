<?php
require "../model/crudArticles.php";

$articles = getArticles();

require "../view/articles/JSON.php";
