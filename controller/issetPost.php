<?php

session_start();

if(isset($_POST['id_article']) || isset($_POST['title']) || isset($_POST['content']) || isset($_POST['link'])) {
  $id_article = $_POST['id_article'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $link = $_POST['link'];
}

for($i = 1; $i < tag_count; ++$i) {
  if(isset($_POST[$i])) {
    $tags[$i] = $_POST[$i];
  }
}
