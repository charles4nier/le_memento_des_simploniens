<?php

  session_start();

  if(isset($_POST['id_article']) || isset($_POST['title']) || isset($_POST['content']) || isset($_POST['link'])) {
    $id_article = $_POST['id_article'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $link = $_POST['link'];
  }

  if(isset($_POST['addLogin']) || isset($_POST['addPassword']) || isset($_POST['role'])) {
    $newLogin = $_POST['addLogin'];
    $newPassword = $_POST['addPassword'];
    $role = $_POST['addRole'];
  }

  $tagValues = [];

  // $_POST['countTags'] contient le nombre d'input tag présent dans le formulaire. On boucle dessus pour vérifier le nombre de input tag séléctionnés et on les ajoute dans le tableau $tagValues.
  if(isset($_POST['countTags'])) {
    for($i = 1; $i <= $_POST['countTags']; $i++)
    {
      if(isset($_POST[$i]))
      {
        array_push($tagValues, $_POST[$i]);
      }
    }
  }
