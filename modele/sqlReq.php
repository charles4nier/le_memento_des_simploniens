<?php

try {

  $bdd = new PDO('mysql:host=localhost;dbname=portfolio_db;charset=utf8', 'root', 'coucou1948');

} catch (Exception $e) {

  die('Erreur : ' . $e->getMessage());

}
