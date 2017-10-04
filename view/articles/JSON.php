<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
?>
  {
    "articles" : [
<?php
  $first = true;

  foreach ($articles as $article) {
    if (!$first) {
      echo ",\n";
    }
?>
      {
        "id_article" : "<?= $article["id_article"] ?>",
        "title" : "<?= $article["title"] ?>",
        "content" : "<?= trim(preg_replace('/\s\s+/', '', $article["content"])) ?>",
        "link" : "<?= $article["link"] ?>",
        "id_user" : "<?= $article["id_user"] ?>"
      }<?php
    $first = false;
  }
?>
  ]
}
