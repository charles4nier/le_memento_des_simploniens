<?php
require '../../controller/issetPost.php';

require '../../model/crudArticles.php';

editArticle($type, $title, $content, $demo, $id);

header('Location: http://localhost/portfolio_angularJs/public/index.php');
