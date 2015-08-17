  <!-- Modal -->
  <div class="modal fade" id="rteEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Route Editor</h4>
        </div>
        <div class="modal-body">
          <div class="well">
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
                  <input type="text" name="" class="form-control" ng-model="editingRte.day"/>
                </li>
            </ul>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="saveRte()">Save changes</button>
        </div>
      </div>
    </div>
  </div>