<?php
  require '../../model/Tag.php';

  require '../../controller/issetPost.php';

  require '../../model/Article.php';

  Article::createArticle($title, $content, $link);

  if(isset($tags))
  {
    $datas = Tag::getTags();
    $checkedTags = [];

    foreach ($datas as $data)
    {
      array_push($checkedTags, $data['tag_name']);
    }

    for($i = 0; $i <= count($tags); $i++)
    {
      if(!in_array($tags[$i], $checkedTags))
      {
        Tag::createTag(strtoupper($tags[$i]));
      }
    }

  }

header('Location: http://localhost/le_memento_des_simploniens/public/index.php');
