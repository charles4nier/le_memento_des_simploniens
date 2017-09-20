<?php
  require '../../model/Tag.php';

  require '../../controller/issetPost.php';

  require '../../model/Article.php';

  require '../../model/tagArticle.php';

  Article::createArticle($title, $content, $link);

  // create Tag

  if(isset($tagValues))
  {
    // get existant tags
    $datas = Tag::getTags();
    $checkedTags = [];

    // ttt sur tab tags existant : récupération tagName
    foreach ($datas as $data)
    {
      array_push($checkedTags, $data['tag_name']);
    }

    for($i = 0; $i < count($tagValues); $i++)
    {
      if(!in_array($tagValues[$i], $checkedTags))
      {
        Tag::createTag(strtoupper($tagValues[$i]));
      }
    }

    // TODO: faire une requête qui compte le nbre d'article
    $articles = Article::getArticles();
    $articlesLength = count($articles) - 1;

    // Create tagArticle
    // get new existant tags
    $datas = Tag::getTags();

    for($i = 0; $i < count($tagValues); $i++)
    {
      foreach ($datas as $data)
      {
        if($tagValues[$i] === $data['tag_name'])
        {

          tagArticle::createTagArticle($articles[$articlesLength]['id_article'],$data['id_tag']);
          echo "à créer" .$tagValues[$i] .PHP_EOL;
        }
        else
        {
          echo "à po compris" .$tagValues[$i] .PHP_EOL;
        }
      }
    }
  }

header('Location: http://localhost/le_memento_des_simploniens/public/index.php');
