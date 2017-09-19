<?php

require '../../controller/issetPost.php';

require '../../model/Article.php';

require '../../model/Tag.php';

Article::createArticle($title, $content, $link);



header('Location: http://localhost/le_memento_des_simploniens/public/index.php');
