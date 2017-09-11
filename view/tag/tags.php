<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
?>
{
  "tags" : [
<?php
$first = true;

foreach ($tags as $tag) {
  if (!$first) {
    echo ",\n";
  }
?>
    {
      "id_tag" : "<?= $tag["id_tag"] ?>",
      "tag_name" : "<?= $tag["tag_name"]?>"
    }<?php
  $first = false;
}
?>
  ]
}
