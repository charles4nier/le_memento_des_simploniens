<?php

session_start();

if(isset($_POST['login']) && isset($_POST['password'])) {
  require "sqlReq.php";

  $req = $bdd->prepare('SELECT * FROM user WHERE login=:login AND password=:password');
  $req->execute(array(
    'login'=> $_POST['login'],
    'password'=> $_POST['password']
  ));
  $user = $req->fetch();

  if($user)
  {
    $_SESSION['login'] = $user['login'];
    $_SESSION ['password'] = $user['password'];
  }
}

$adminConnected=(isset($_SESSION ['login']));
