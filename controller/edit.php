<?php
require 'issetPost.php';

require '../model/crudArticles.php';

editArticle($type, $title, $content, $demo, $id);

header('Location: http://localhost/portfolio_angularJs/controller/index.php');
