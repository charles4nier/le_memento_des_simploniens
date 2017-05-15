<?php

require 'issetPost.php';

require '../modele/crudArticles.php';

if(isset($_GET['supprimer'])) {
  deleteArticle($_GET['supprimer']);
}

header('Location: http://localhost/portfolio_angularJs/controller/index.php');
