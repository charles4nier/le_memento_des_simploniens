<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

try {

  $bdd = new PDO('mysql:host=localhost;dbname=portfolio_db;charset=utf8', 'charles4nier', 'coucou1948coucou1948');

} catch (Exception $e) {

  die('Erreur : ' . $e->getMessage());

}

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

$output .= $jsonObject;
$output .=']}';

echo $output;

$db->closeCursor();
