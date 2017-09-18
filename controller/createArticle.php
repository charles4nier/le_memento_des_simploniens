<?php

require '../../controller/issetPost.php';

require '../../model/Article.php';

require '../../model/Tag.php';

Article::createArticle($title, $content, $link);



header('Location: http://localhost/portfolio_angularJs/public/index.php');
