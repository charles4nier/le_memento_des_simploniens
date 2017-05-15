<?php

session_start();

if(isset($_POST['id']) || isset($_POST['type']) || isset($_POST['title']) || isset($_POST['content']) || isset($_POST['demo'])) {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $type = strtoupper($_POST['type']);
  $content = $_POST['content'];
  $demo = $_POST['demo'];
}
