<?php

session_start();

if(isset($_POST['id_article']) || isset($_POST['title']) || isset($_POST['content']) || isset($_POST['link'])) {
  $id_article = $_POST['id_article'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $link = $_POST['link'];
}

$tags = [];

if(isset($_POST['countTags'])) {
  $datas = Tag::getTags();

  foreach($datas as $data)
  {
    if(isset( $_POST[$data['tag_name']] ) )
    {
      array_push($tags, $_POST[$data['tag_name']]);
    }
  }

  for($i = 1; $i <= $_POST['countTags']; $i++)
  {
    if(isset($_POST[$i]))
    {
      array_push($tags, $_POST[$i]);
    }
  }
}
