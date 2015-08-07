<!DOCTYPE html>
<html lang="en" ng-app="scheduleApp">

<head>
  <?php include 'components/head.php'; ?>
</head>

<body ng-controller="MainController">

<?php include 'components/topnav.php'; ?>


  <!-- Begin page content -->
  <div class="container-fluid">
    <div class="page-header">
      <h1>Sticky footer with fixed navbar</h1>
    </div>
    <table class="table table-bordered">
      <tr class="success">
        <td>#</td>
        <td>Mon</td>
        <td>Tue</td>
        <td>Wed</td>
        <td>Thr</td>
        <td>Fri</td>
        <td>Sat</td>
        <td>Sun</td>
      </tr>
      <tr ng-repeat="sche in schedules">
        <td class="text-center">{{sche.timeframe}}</td>
        <td ng-repeat="time in sche.times track by $index" ng-click="openTimeframe($index, $parent.$index, time)" ng-class="{danger: time==0}">
          <ul>
            <li ng-repeat="user in time.users">{{user.name}}</li>
          </ul>
        </td>
      </tr>
    </table>
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
