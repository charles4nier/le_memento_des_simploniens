<?php
require '../../controller/issetPost.php';

require '../../model/Article.php';

Article::editArticle($type, $title, $content, $demo, $id);

header('Location: http://localhost/portfolio_angularJs/public/index.php');
