<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require "sqlReq.php";

$db = $bdd->query('SELECT * FROM article');

$output = '{"articles" : [';

$jsonObject = "";

while($data = $db->fetch()) {

  if($jsonObject != "") {
    $jsonObject .= ",";
  }

  $jsonObject .= '{"type" : "' .$data["type"]. '",';
  $jsonObject .= '"title" : "' .$data["title"]. '",';
  $jsonObject .= '"content" : "' .$data["content"]. '",';
  $jsonObject .= '"demo" : "' .$data["demo"]. '"}';

}

$output .= $jsonObject . ']}';

echo $output;

$db->closeCursor();
