  <!-- Modal -->
  <div class="modal fade" id="rteEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Route Editor</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <h3>Route detail:</h3>
              <ul class="list-group" ng-if="editingRte.rte_name">
                  <li class="list-group-item">
                    <strong>Route name:</strong>: 
                    <input type="text" name="" class="form-control" ng-model="editingRte.rte_name"/>
                  </li>
                  <li class="list-group-item">
                    <strong>Driver name:</strong>: 
                    <input type="text" name="" class="form-control" ng-model="editingRte.driver_name"/>
                  </li>
                  <li class="list-group-item">
                    <strong>Day:</strong>: 
                    <input type="number" min="1" max="7" name="" class="form-control" ng-model="editingRte.day"/>
                  </li>
              </ul>
            </div>
            <div class="col-sm-6">
              <h3>Choose route to edit:</h3>
              <hr>
              <a class="btn btn-default btn-block" href="#" role="button" ng-repeat="rte in rtes" ng-click="setEditingRte(rte)">{{rte.rte_name}} ({{rte.passengers.length}}<span class="glyphicon glyphicon-user" aria-hidden="true"></span>)</a>
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