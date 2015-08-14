  <!-- Fixed navbar -->
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Project name</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right" ng-if="view.name == 'user'">
          <li><button type="button" class="btn btn-success navbar-btn" ng-click="addUser()">Add user</button></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" ng-if="view.name == 'home'">
          <li><button type="button" class="btn btn-success navbar-btn" data-toggle="modal" data-target="#addRteModal" ng-click="addRte()">Add route</button></li>
          <li><a href="/user.php">Users</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>