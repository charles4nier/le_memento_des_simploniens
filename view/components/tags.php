<main n-app="myApp" ng-controller="accessDataBaseTag">
  <nav class="tag_nav">
    <p class="perfectCenter" ng-repeat="tag in tags"><a class="perfectCenter" href="tags/test.php?id_tag={{tag.id_tag}}">{{tag.tag_name}}</a></p>
  </nav>
</main>
