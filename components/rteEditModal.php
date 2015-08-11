  <!-- Modal -->
  <div class="modal fade" id="rteEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{targetTrip.label}}</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <h3>Scheduled guests</h3>
              <div class="well">
                <p class="text-right">
                  <a href="" class="btn btn-danger" ng-click="removeAll(targetTrip)">Remove all</a>
                </p>
                <div class="list-group">
                  <a href="#" class="list-group-item" ng-repeat="guest in targetTrip.guests track by $index | orderBy:'name'" ng-click="removeGuest(targetTrip, $index, guest)">
                    {{guest.name}}<span class="glyphicon glyphicon-minus pull-right text-danger" aria-hidden="true"></span>
                  </a>
                </div>          
              </div>
            </div>
            <div class="col-sm-6">
              <h3>Available guests</h3>
              <div class="well">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon2">Search</span>
                  <input type="text" class="form-control" placeholder="Guest name" aria-describedby="basic-addon2" ng-model="filterExp.name">
                </div>
                <p class="text-right">
                  <a href="" class="btn btn-primary" ng-click="addAll(targetTrip)">Add all</a> <a href="" class="btn btn-info" ng-click="addAllRound(targetTrip)">Add round trip</a>
                </p>
                <hr>
                <div class="list-group">
                  <a href="#" class="list-group-item" ng-repeat="guest in guests | filter:filterExp | orderBy:'name'" ng-click="scheduleGuest(targetTrip, guest)">
                    {{guest.name}}<span class="glyphicon glyphicon-plus pull-right text-success" aria-hidden="true"></span>
                  </a>
                </div>          
              </div>
            </div>         
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>