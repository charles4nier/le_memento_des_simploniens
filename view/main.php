<main class="flexRow justifySpaceAround">

  <form class="flexColumn perfectCenter" action="../modele/create.php" method="post" ng-show="show">
    <label for="type">type :</label>
    <input type="text" name="type" value="">

    <label for="title">Title :</label>
    <input type="text" name="title" value="">

    <label for="content">Content :</label>
    <textarea name="content" rows="8" cols="80"></textarea>

    <label for="demo">Demo :</label>
    <input type="text" name="demo" value="">

    <input type="submit" name="submit" value="Envoyer">
  </form>

  <form class="flexColumn perfectCenter" action="../modele/edit.php" method="post" ng-show="showEditForm">
    <label for="type">type :</label>
    <input type="text" name="type" value="{{articles[length].type}}">

    <label for="title">Title :</label>
    <input type="text" name="title" value="{{articles[length].title}}">

    <label for="content">Content :</label>
    <textarea name="content" rows="8" cols="80">{{articles[length].content}}</textarea>

    <label for="demo">Demo :</label>
    <input type="text" name="demo" value="{{articles[length].demo}}">

    <input type="submit" name="submit" value="Envoyer">
  </form>

  <nav ng-show="!show" ng-hide="showEditForm">
    <ul>
      <li ng-repeat="article in articles" ng-click="getIndex($event)">{{article.title}}</li>
    </ul>
  </nav>

  <article class="flexColumn perfectCenter" ng-show="!show" ng-hide="showEditForm">
    <?php
      if($adminConnected == true)
      {
    ?>
    <a href="index.php?supprimer={{articles[length].id}}"><button type="button" name="button">Supprimer l'article</button></a>
    <a href="" ng-click="showEditForm = !showEditForm"><button type="button" name="button">Editer l'article</button></a>
    <?php
      }
    ?>
    <h2>{{ articles[length].title }}</h2>
    <p>{{ articles[length].content }}</p><br>
    <div class="flexColumn perfectCenter">
      <div class="testZone">
        {{ articles[length].demo}}
      </div>
    </div>
    <div class="flexRow boutonContainer justifySpaceBetween">
      <button type="button" name="button" ng-click="before()" >before</button>
      <button type="button" name="button" ng-click="after()">after</button>
    </div>
  </article>
</main>
