<main id="main class="container">
  <div class="row">
    <!-- Formulaire de création d'article -->
    <form class="flexColumn perfectCenter" action="../public/articles/store.php" method="post" ng-show="showCreateForm">
      <div id="tagContainerParent" class="inputContainer tagContainerParent">
        <div id="tagsContainer" class="tagsContainer">
          <div id="tagContainer{{tag.id_tag}}" class="tagContainer" ng-repeat="tag in tags" ng-click="check($event)">
            <label for="{{tag.id_tag}}">{{tag.tag_name}}</label>
            <input class="tags" type="checkbox" name="{{tag.id_tag}}" value="{{tag.tag_name}}">
          </div>
        </div>
        <div class="addTagContainer">
          <input id="addTagInput" type="text" name="" value="" class="test" ng-focus="displayValidate($event)" ng-keyup="displayValidate($event)"
          ng-blur="displayValidate($event)">
          <span class="roundIcon" ng-show="showAddTags" ng-click="showAddTagInput()">Ajouter un tag</span>
          <i id="validAddTag" class="material-icons roundIcon" ng-show="!showAddTags" ng-click="pushTag($event)">check</i>
        </div>
      </div>
      <div class="inputcontainer">
        <input type="text" class="inputText" name="title" required/>
        <label class="floating-label" for="title">Titre :</label>
      </div>
      <div class="inputcontainer">
        <textarea name="content" rows="8" required></textarea>
        <label class="floating-label" for="content">Contenu :</label>
      </div>
      <div class="inputcontainer">
        <input type="text" class="inputText" name="link" required/>
        <label class="floating-label" for="link">Lien :</label>
      </div>
      <input class="connexion" type="submit" name="submit" value="Envoyer">
    </form>

    <!-- Formulaire d'édition d'article -->
    <form class="flexColumn perfectCenter" action="../public/articles/update.php" method="post" ng-show="showEditForm">
      <input type="hidden" name="id_article" value="{{articles[length].id_article}}">
      <div class="inputcontainer">
        <input type="text" name="tag" value="{{articles[length].type}}" required>
        <label class="floating-label" for="title">Tag :</label>
      </div>
      <div class="inputcontainer">
        <input type="text" name="title" value="{{articles[length].title}}" required/>
        <label class="floating-label" for="title">Titre :</label>
      </div>
      <div class="inputcontainer">
        <textarea name="content" rows="8" required>{{articles[length].content}}</textarea>
        <label class="floating-label" for="content">Contenu :</label>
      </div>
      <div class="inputcontainer">
        <input type="text" name="link" value="{{articles[length].link}}" required>
        <label class="floating-label" for="link">Lien :</label>
      </div>
      <input class="connexion" type="submit" name="submit" value="Envoyer">
    </form>
  </div>
  <div class="row articleContainer" ng-show="show">
    <!--  menu latéral droit -->
    <nav class="col-md-3 hidden-xs hidden-sm" ng-show="show">
      <h2 class="text-center">Tous les articles</h2>
      <ul>
        <li ng-repeat="article in articles" ng-click="getIndex($event)">{{article.title}}</li>
      </ul>
    </nav>

    <div class="test col-md-offset-1 col-md-8 col-sm-12">

      <article class="flexColumn justifySpaceBetween" ng-show="show">
        <!--  pannel admin si l'admin est connecté-->
        <?php
          if($adminConnected == true)
          {
        ?>
        <div class="boutonContainer">
          <a class="justifyFlexStart" href="../public/articles/delete.php?supprimer={{articles[length].id_article}}"><i class="material-icons">delete</i></a>
          <a href="" ng-click="displayEditForm()"><i class="material-icons">edit</i></a>
        </div>
        <?php
          }
        ?>

        <!--  Zone d'affichage de l'article -->
        <h2>{{ articles[length].title }}</h2>
        <p>{{ articles[length].content }}</p><br>
        <div class="flexColumn perfectCenter">
          <a href="{{ articles[length].link}}" target="_blank" class="testZone">
            {{ articles[length].link}}
          </a>
        </div>
        <nav class="flexRow boutonContainer justifySpaceBetween">
          <i class="material-icons perfectCenter" ng-click="before()">arrow_back</i>
          <i class="material-icons perfectCenter" ng-click="after()">arrow_forward</i>
        </nav>
      </article>
    </div>
  </div>

  <!--  page des tags -->
  <div ng-show="showTags">
    <nav class="tag_nav">
      <p class="perfectCenter" ng-repeat="tag in tags" ng-click="displayTagArticles($event)">{{tag.tag_name}}</p>
    </nav>
  </div>

   <!-- pages des tags articles-->
  <div ng-show="showTagArticles">
    <nav class="tagArticleNav perfectCenter">
      <div class="card" ng-repeat="dataTagArticle in dataTagArticles">
        <p>{{dataTagArticle.tag_article_title}}</p>
        <button class="connexion" data-title="{{dataTagArticle.tag_article_title}}" ng-click="getTitle($event)"> Voir l'article </button>
        <p><span>Catégorie :</span> {{dataTagArticle.tag_article_name}}</p>
      </div>
    </nav>
  </div>
</main>
