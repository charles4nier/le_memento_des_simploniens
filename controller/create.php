<?php

require '../../controller/issetPost.php';

require '../../model/Article.php';

Article::createArticle($title, $type, $content, $demo);

header('Location: http://localhost/portfolio_angularJs/public/index.php');
