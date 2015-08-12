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
        <a class="btn btn-primary btn-block" href="#" role="button" ng-repeat="rte in rtes" ng-click="setTargetRte(rte)">{{rte.rte_name}} - {{rte.day}} (<span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{rte.passengers.length}})</a>
      </div>
    </div>
    <hr>
    <div ng-if="targetRte">
      <h2>{{targetRte.rte_name}} - {{targetRte.driver_name}} <span class="glyphicon glyphicon-pencil pull-right clickable text-success" data-toggle="modal" data-target="#myModal" ng-click="editPassengers(targetRte.passengers)" aria-hidden="true"></span></h2>
      <div class="">
        <table class="table">
          <thead>
            <tr>
              <th class="table-id">#</th><th class="table-name">Passanger</th><th class="table-phone">Phone</th><th class="table-pickup">Pickup address</th><th class="table-return">Return address</th><th class="table-transit">Transit</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="guest in targetRte.passengers track by $index">
              <td class="table-id">{{$index+1}}</td>
              <td class="table-name">{{guest.name}}</td>
              <td class="table-phone">
                <div class="input-group">
                  <input type="text" class="form-control" aria-label="..." ng-model="guest.tel">
                </div><!-- /input-group -->
              </td>
              <td class="table-pickup">
                <div class="input-group">
                  <input type="text" class="form-control" aria-label="..." ng-model="guest.pickup">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li ng-if="guest.add_1"><a href="#" ng-click="guest.pickup = guest.add_1">{{guest.add_1}}</a></li>
                      <li ng-if="guest.add_2"><a href="#" ng-click="guest.pickup = guest.add_2">{{guest.add_2}}</a></li>
                      <li ng-if="guest.add_3"><a href="#" ng-click="guest.pickup = guest.add_3">{{guest.add_3}}</a></li>
                    </ul>
                  </div><!-- /btn-group -->
                </div><!-- /input-group -->
              </td>
              <td class="table-return">
                <div class="input-group">
                  <input type="text" class="form-control" aria-label="..." ng-model="guest.return">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li ng-if="guest.add_1"><a href="#" ng-click="guest.return = guest.add_1">{{guest.add_1}}</a></li>
                      <li ng-if="guest.add_2"><a href="#" ng-click="guest.return = guest.add_2">{{guest.add_2}}</a></li>
                      <li ng-if="guest.add_3"><a href="#" ng-click="guest.return = guest.add_3">{{guest.add_3}}</a></li>
                    </ul>
                  </div><!-- /btn-group -->
                </div><!-- /input-group -->
              </td>
              <td class="table-transit">
                <div class="input-group">
                  <input type="text" class="form-control" aria-label="..." ng-model="guest.transit">
                </div><!-- /input-group -->
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php include 'components/scheduleModal.php'; ?>
<?php include 'components/rteEditModal.php'; ?>
<?php include 'components/footer.php'; ?>
<script src="js/controller.js"></script>
</body>

</html>
