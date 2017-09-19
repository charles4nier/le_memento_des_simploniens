<?php

require '../../controller/issetPost.php';

require '../../model/Article.php';

if(isset($_GET['supprimer'])) {
  Article::deleteArticle($_GET['supprimer']);
}

header('Location: http://localhost/le_memento_des_simploniens/public/index.php');
