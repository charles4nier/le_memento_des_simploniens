<?php

require '../../controller/issetPost.php';

require '../../model/Article.php';

if(isset($_GET['supprimer'])) {
  Article::deleteArticle($_GET['supprimer']);
}

header('Location: http://localhost/portfolio_angularJs/public/index.php');
