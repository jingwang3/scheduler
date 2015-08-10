<!DOCTYPE html>
<html lang="en" ng-app="scheduleApp">

<head>
  <?php include 'components/head.php'; ?>
</head>

<body ng-controller="UserController">

<?php include 'components/topnav.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-5">
            <div class="list-group">
              <a href="#" class="list-group-item" ng-class="{active : isSelected(user)}" ng-click="selectUser(user)" ng-repeat="user in users">
                {{user.name}}
              </a>
            </div>
        </div>
        <div class="col-sm-7">
            <ul class="list-group">
                <li class="list-group-item" ng-repeat="(key, value) in selectedUser">
                  <strong>{{key}}</strong>: 
                  <input type="text" name="" class="form-control" ng-model="selectedUser[key]"/>
                </li>
            </ul>
            <p class="text-center" ng-if="userIsEdited()">
                <a href="" class="btn btn-default" ng-click="resetUserEdits()">cancel</a> <a href="" class="btn btn-success" ng-click="saveUserEdits()">save</a>
            </p>
        </div>
    </div>
</div>

<!-- Begin page content -->
<?php include 'components/footer.php'; ?>
<script src="js/userController.js"></script>
</body>

</html>
