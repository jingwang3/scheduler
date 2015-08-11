<!DOCTYPE html>
<html lang="en" ng-app="scheduleApp">

<head>
  <?php include 'components/head.php'; ?>
</head>

<body ng-controller="MainController">

<?php include 'components/topnav.php'; ?>


  <!-- Begin page content -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2">
        <a class="btn btn-primary btn-block" href="#" role="button" ng-repeat="rte in rtes" ng-click="setTargetRte(rte)">{{rte.rte_name}}</a>
      </div>
    </div>
    <hr>
    <div class="row" ng-if="targetRte">
      <div class="col-sm-6">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">{{targetRte.pickup.label}}<span class="glyphicon glyphicon-user pull-right" aria-hidden="true">-{{targetRte.driver_name}}</span></h3>
          </div>
          <div class="panel-body">
            <ul>
              <li ng-repeat="guest in targetRte.pickup.guests">
                Guest name: <strong>{{guest.name}}</strong> Transit info: <strong>{{guest.transit_info}}</strong>
              </li>
            </ul>
            <a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal" ng-click="setTargetTrip(targetRte.pickup)">Edit</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title">Drop off<span class="glyphicon glyphicon-user pull-right" aria-hidden="true">-{{targetRte.driver_name}}</span></h3>
          </div>
          <div class="panel-body">
            <ul>
              <li ng-repeat="guest in targetRte.dropoff.guests">
                {{guest.name}}
              </li>
            </ul>
            <a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal" ng-click="setTargetTrip(targetRte.dropoff)">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'components/scheduleModal.php'; ?>
<?php include 'components/footer.php'; ?>
<script src="js/controller.js"></script>
</body>

</html>
