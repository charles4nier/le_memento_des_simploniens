<?php

require '../../controller/issetPost.php';

require '../../model/Article.php';

require '../../model/Tag.php';

Article::createArticle($title, $content, $link);

// for($i = 1; $i < count($tags); ++$i) {
//
//     $tags[$i] = $_POST[$i];
// }

header('Location: http://localhost/le_memento_des_simploniens/public/index.php');
