<?php
  class User {
    public static function connect($login, $password)
    {
      require 'sqlReq.php';

      $req = $bdd->prepare('SELECT * FROM user WHERE login=:login AND password=:password');
      $req->execute(array(
        'login'=> $login,
        'password'=> $password
      ));
      return $req->fetch();
    }
  }
