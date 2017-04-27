<?php

try {

  $bdd = new PDO('mysql:host=localhost;dbname=portfolio_db;charset=utf8', 'charles4nier', 'coucou1948coucou1948');

} catch (Exception $e) {

  die('Erreur : ' . $e->getMessage());

}
