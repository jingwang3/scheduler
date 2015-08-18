  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" ng-click="savePassengers(tempPassengers)" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{targetRte.rte_name}}</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-4">
              <h3>New Passengers</h3>
              <div class="well">
                <div class="list-group">
                  <a href="#" class="list-group-item" ng-repeat="guest in tempPassengers track by $index | orderBy:'name'" ng-click="removePassenger(tempPassengers, $index)">
                    {{guest.pass_name || guest.name}} ID: {{guest.pass_id}}<span class="glyphicon glyphicon-minus pull-right text-danger" aria-hidden="true"></span>
                  </a>
                </div>          
              </div>
            </div>
            <div class="col-sm-8">
              <h3>All users</h3>
              <div class="well">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon2">Search</span>
                  <input type="text" class="form-control" placeholder="User name" aria-describedby="basic-addon2" ng-model="filterExp.name">
                </div>
                <hr>
                <div class="list-group">
                  <a href="#" class="list-group-item" ng-repeat="guest in avaGuests track by $index | filter:filterExp | orderBy:'name'" ng-if="guestIsAvailable(guest)" ng-click="addPassenger(guest, $index)">
                    {{guest.name}} ID: {{guest.id}}<span class="glyphicon glyphicon-plus pull-right text-success" aria-hidden="true"></span>
                  </a>
                </div>
              </div>         
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" ng-click="savePassengers()" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>