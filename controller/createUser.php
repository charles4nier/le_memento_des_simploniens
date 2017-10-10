<?php
    require '../../controller/issetPost.php';
    require '../../model/User.php';

    User::createUser($newLogin, $newPassword, $role);

    session_start();

    $user = User::connect($newLogin, $newPassword);

    if($user) {
      $_SESSION['login'] = $user['login'];
      $_SESSION ['password'] = $user['password'];
    }

    $adminConnected=(isset($_SESSION ['login']));

    header('Location: http://localhost/le_memento_des_simploniens/public/index.php');
