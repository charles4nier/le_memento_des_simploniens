<?php
  session_start();

  if(isset($_POST['idUserToCheck'])) {
    echo $_POST['idUserToCheck'];
    $_SESSION['idUserToCheck'] = $_POST['idUserToCheck'];
  }
