<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION['password']);

header('Location: http://localhost/le_memento_des_simploniens/public/index.php');
