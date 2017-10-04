<?php
  try {

    $bdd = new PDO('mysql:host=localhost;dbname=portfolio_db;charset=utf8', 'root', 'coucou1948');
    //local: 'mysql:host=localhost;dbname=portfolio_db;charset=utf8', 'root', 'coucou1948'
    // en ligne: 'mysql:host=charlesnhd4nier.mysql.db;dbname=charlesnhd4nier' 'charlesnhd4nier','Coucou1948'

  } catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());

  }
