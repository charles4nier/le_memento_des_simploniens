<?php

  session_start();

  if(isset($_POST['login']) && isset($_POST['password'])) {
    require '../model/User.php';

    $user = User::connect($_POST['login'], $_POST['password']);

    if($user)
    {
      $_SESSION['login'] = $user['login'];
      $_SESSION['password'] = $user['password'];
      $_SESSION['idUser'] = $user['id_user'];
    }
  }

  $adminConnected=(isset($_SESSION ['login']));
