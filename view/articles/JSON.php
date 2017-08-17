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
      "id" : "<?= $article["id"] ?>",
      "type" : "<?= $article["type"] ?>",
      "title" : "<?= $article["title"] ?>",
      "content" : "<?= trim(preg_replace('/\s\s+/', '', $article["content"])) ?>",
      "demo" : "<?= $article["demo"] ?>"
    }<?php
  $first = false;
}
?>

  ]
}
