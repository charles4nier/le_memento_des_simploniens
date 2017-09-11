<?php
require '../../controller/issetPost.php';

require '../../model/Article.php';

Article::editArticle($title, $content, $link, $id_article);

header('Location: http://localhost/portfolio_angularJs/public/index.php');

// var_dump($title, $content, $link, $id_article);
