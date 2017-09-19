<?php
  require '../../model/Tag.php';

  require '../../controller/issetPost.php';

  require '../../model/Article.php';

  require '../../model/tagArticle.php';

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

    $articles = Article::getArticles();
    $articlesLength = count($articles) - 1;
    $articles[$articlesLength]['id_article'];

    $datas = Tag::getTags();

    $tagArticles = [];

    for($i = 0; $i <= count($tags); $i++)
    {
      foreach ($datas as $data)
      {
        if($tags[$i] === $data['tag_name'])
        {
          tagArticle::createTagArticle($articles[$articlesLength]['id_article'], $data['id_tag']);
        }
      }
    }
  }

header('Location: http://localhost/le_memento_des_simploniens/public/index.php');
