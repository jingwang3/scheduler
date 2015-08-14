  <!-- Modal -->
  <div class="modal fade" id="addRteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add Route</h4>
        </div>
        <div class="modal-body">
          <div class="well">
              <h3>New route:</h3>
              <a class="btn btn-default btn-block" href="#" role="button" data-dismiss="modal" ng-click="addNewRte()">New route (<span class="glyphicon glyphicon-user" aria-hidden="true"></span>)</a>
              <h3>Copy from existing route:</h3>
              <hr>
              <a class="btn btn-primary btn-block" href="#" role="button" data-dismiss="modal" ng-repeat="rte in rtes" ng-click="addExistingRte(rte)">{{rte.rte_name}} ({{rte.passengers.length}}<span class="glyphicon glyphicon-user" aria-hidden="true"></span>)</a>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>