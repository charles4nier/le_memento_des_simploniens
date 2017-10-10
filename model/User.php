<?php
  require 'sqlReq.php';

  class User {
    public static function connect($login, $password)
    {
      global $bdd;

      $req = $bdd->prepare('SELECT * FROM user WHERE login=:login AND password=:password');
      $req->execute(array(
        'login'=> $login,
        'password'=> $password
      ));
      return $req->fetch();
    }

    public static function createUser($login, $password, $role) {
      global $bdd;

      $req =  $bdd->prepare('INSERT INTO user (login, password, role) VALUES (:login, :password, :role)');

      $req->execute(array(
        'login' => $login,
        'password' => $password,
        'role' => $role
      ));
    }
  }
