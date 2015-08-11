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
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h3 class="panel-title">Pick up<span class="glyphicon glyphicon-user pull-right" aria-hidden="true"></span></h3>
          </div>
          <div class="panel-body">
            <a href="">Edit</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h3 class="panel-title">Drop off</h3>
          </div>
          <div class="panel-body">
            <a href="">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{schedules[currentTimeFrame.y].timeframe}}</h4>
        </div>
        <div class="modal-body">
          <ul>
            <li ng-repeat="user in currentTimeFrame.users">
              {{user.name}}
            </li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<?php include 'components/footer.php'; ?>
<script src="js/controller.js"></script>
</body>

</html>
