<?php

require '../../controller/issetPost.php';

require '../../model/Article.php';

Article::createArticle($title, $content, $link);

var_dump($title, $content, $link);

header('Location: http://localhost/portfolio_angularJs/public/index.php');
