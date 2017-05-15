<?php

require 'issetPost.php';

require '../modele/crudArticles.php';

createArticle($title, $type, $content, $demo);

header('Location: http://localhost/portfolio_angularJs/controller/index.php');
