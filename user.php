<!DOCTYPE html>
<html lang="en" ng-app="scheduleApp">

<head>
  <?php include 'components/head.php'; ?>
</head>

<body ng-controller="UserController">

<?php include 'components/topnav.php'; ?>
<div class="container-fluid">
    <p>
        <ul ng-repeat="user in users">
            <li ng-repeat="(key, value) in user">
              <span> {{key}} </span> <span> {{ value }} </span>
            </li>
        </ul>
    </p>
</div>

<!-- Begin page content -->
<?php include 'components/footer.php'; ?>
<script src="js/userController.js"></script>
</body>

</html>
