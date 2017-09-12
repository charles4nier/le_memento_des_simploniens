<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
?>
{
  "tagArticles" : [
<?php
$first = true;

foreach ($tagArticles as $tagArticle) {
  if (!$first) {
    echo ",\n";
  }
?>
    {
      "tag_article_title" : "<?= $tagArticle["title"] ?>",
      "tag_article_name" : "<?= $tagArticle["tag_name"]?>"
    }<?php
  $first = false;
}
?>
  ]
}
