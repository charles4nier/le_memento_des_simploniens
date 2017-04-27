<main class="flexRow justifySpaceAround">

  <nav>
    <ul>
      <li ng-repeat="article in articles" ng-click="getIndex($event)">{{article.title}}</li>
    </ul>
  </nav>

  <article class="flexColumn perfectCenter">
    <?php
      if($adminConnected == true)
      {
    ?>
    <a href="#"><button type="button" name="button">Edit</button></a>
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
