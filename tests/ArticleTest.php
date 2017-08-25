<?php

  declare(strict_types=1);

  require __Dir__  . "/../model/Article.php";

  use PHPUnit\Framework\TestCase;

  class ArticleTest extends TestCase
  {

    public function testCanDeleteArticle()
    {
      $this->assertEquals(
          true,
          Article::deleteArticle('2')
        );
    }

    public function testCannotDeleteArticle()
    {
      $this->assertEquals(
          false,
          Article::deleteArticle(2)
        );
    }

    public function testCannotDeleteArticle0()
    {
      $this->assertEquals(
          false,
          Article::deleteArticle('0')
        );
    }
  }

?>
