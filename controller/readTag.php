<?php
  require "../../model/Tag.php";

  $tags = Tag::getTags();

  require "../../view/tag/tags.php";
