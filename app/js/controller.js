angular.module('scheduleApp', [])
  .controller('MainController', function($scope, $http) {
    $scope.view = {name: "home"};
    $scope.loadAllRtes = function(){
      $http.get('/db_driver/get_rte.php').
        then(function(response) {
          // this callback will be called asynchronously
          // when the response is available
          $scope.rtes = response.data;
        }, function(response) {
          // called asynchronously if an error occurs
          // or server returns response with an error status.
          console.log(response.status);
        });
    };

    $scope.loadAllRtes();
    
    $http.get('/db_driver/get_people.php').
      then(function(response) {
        // this callback will be called asynchronously
        // when the response is available
        $scope.guests = response.data;
      }, function(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        console.log(response.status);
      });   

    $scope.filterExp = {name:''};
    $scope.tempPassengers = [];

    $scope.setTargetRte = function(rte, ind){
      $scope.editingRte = angular.copy(rte);
      $scope.targetRte = rte;
      $scope.targetRteIndex = ind; 
    };
    
    $scope.editPassengers = function(psgrs){
      $scope.tempPassengers = angular.copy(psgrs);
      $scope.avaGuests = angular.copy($scope.guests);
    };
    
    $scope.guestIsAvailable = function(guest){
      var flag = true;
      for(var i = 0; i < $scope.tempPassengers.length; i++){
          if($scope.tempPassengers[i].pass_id !== undefined){
              if(guest.id === $scope.tempPassengers[i].pass_id){
                  flag = false;
              }  
          }else if(guest.id === $scope.tempPassengers[i].id){
                flag = false;  
          }
      }
      return flag;
    };
    
    $scope.addPassenger = function(guest, ind){

            var newGuest = {
                rte_id: $scope.targetRte.rte_id,
                pass_id: guest.id
            };
          $http.post('/db_driver/rte_add_pass.php', newGuest, {
            headers: {
              "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
            }
          }).
          then(function(response) {
            // this callback will be called asynchronously
            // when the response is available
            $scope.tempPassengers.push(angular.copy(guest));
          }, function(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
          });

    };

    // $scope.removeAllPassengers = function(psgrs){
    //     for(var i = 0; i< psgrs.length; i++){
    //         $scope.removePassenger(psgrs, 0);
    //     };
    // };
    
    $scope.removePassenger = function(psgrs, index){
        var requestObj = {
            rte_id: $scope.targetRte.rte_id,
            pass_id: (psgrs[index].pass_id || psgrs[index].id)
        }
        
      $http.post('/db_driver/rte_delete_pass.php', requestObj, {
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
        }
      }).
      then(function(response) {
        // this callback will be called asynchronously
        // when the response is available
        psgrs.splice(index, 1);
      }, function(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
      });
      
    };
    
    $scope.savePassengers = function(){
       $scope.setTargetRte(null);
       $scope.loadAllRtes();
    };
    
    $scope.updatePassengers = function(passengers){
        for(var i = 0; i<passengers.length; i++){
            passengers[i].rte_id = $scope.targetRte.rte_id;
          $http.post('/db_driver/update_rte_pass_info.php', passengers[i], {
            headers: {
              "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
            }
          }).
          then(function(response) {
            // this callback will be called asynchronously
            // when the response is available
          }, function(response) {
            // called asynchronously if an error occurs
            // or server returns response with an error status.
          });            
        };

    };
    
    $scope.chooseAddress = function(trip, address){
      trip = address;
    };
    
    $scope.isSelected = function(rte) {
      return $scope.targetRte === rte;
    };

    $scope.setEditingRte = function(rte){
      $scope.editingRte = rte;
    };
    
    $scope.addNewRte = function(){
      var newRte = {
        "rte_id": $scope.rtes.length + 1,
        "dr_name": "new driver",
        "rte_name": "new route",
        "day": 1,
        "passengers": []
      };
      $http.post('/db_driver/create_rte.php', newRte, {
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
        }
      }).
      then(function(response) {
        // this callback will be called asynchronously
        // when the response is available
        $scope.loadAllRtes();
      }, function(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
      });
    };
    
    $scope.addExistingRte = function(rte){
        var newRte = {
            "org_rte_id": rte.rte_id,
            "day": rte.day
          };
      $http.post('/db_driver/duplicate_rte.php', newRte, {
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
        }
      }).
      then(function(response) {
        // this callback will be called asynchronously
        // when the response is available
        $scope.loadAllRtes();
      }, function(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
      });
    };
    
    $scope.editRte = function(rte){
      $scope.editingRte = angular.copy(rte);
    };
    
    $scope.saveRte = function(){
      $http.post('/db_driver/update_rte_info.php', $scope.editingRte, {
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
        }
      }).
      then(function(response) {
        // this callback will be called asynchronously
        // when the response is available
        $scope.targetRte = angular.copy($scope.editingRte);
      }, function(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
      });
      
    };
    
    $scope.deleteRte = function(rte){
      $http.post('/db_driver/delete_rte.php', rte, {
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
        }
      }).
      then(function(response) {
        // this callback will be called asynchronously
        // when the response is available
        $scope.loadAllRtes();
        $scope.setTargetRte(null);
      }, function(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
      });
    };
  });