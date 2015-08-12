angular.module('scheduleApp', [])
  .controller('MainController', function($scope) {
    $scope.view = {name: "home"};
    $scope.rtes = [{
      "rte_id": "11",
      "driver_name": "中国人",
      "rte_name": "山手线",
      "day": 1,
      "passengers": []
    }];

    $scope.guests = [{
      "id": "1",
      "name": "赵日天",
      "tel": "300011111",
      "add_1": "魔兽",
      "add_2": "争霸",
      "add_3": "dota"
    }, {
      "id": "2",
      "name": "赵日人",
      "tel": "300011111",
      "add_1": "魔兽",
      "add_2": "争霸",
      "add_3": "dota"
    }, {
      "id": "3",
      "name": "赵日地",
      "tel": "300011111",
      "add_1": "魔兽",
      "add_2": "争霸",
      "add_3": "dota"
    }];

    $scope.filterExp = {name:''};
    $scope.tempPassengers = [];

    $scope.setTargetRte = function(rte){
      $scope.targetRte = rte;
    };
    
    $scope.editPassengers = function(psgrs){
      $scope.tempPassengers = angular.copy(psgrs);
    };
    
    $scope.addPassenger = function(guest){
      $scope.tempPassengers.push(angular.copy(guest));
    };

    $scope.removeAllPassengers = function(psgrs){
      psgrs.splice(0,psgrs.length)
    };
    
    $scope.removePassenger = function(psgrs, index){
      psgrs.splice(psgrs[index], 1);
    };
    
    $scope.savePassengers = function(psgrs){
      $scope.targetRte.passengers = psgrs;
    };
    
    $scope.chooseAddress = function(trip, address){
      trip = address;
      console.log(trip);
    };
    
    $scope.addRte = function(){
      
    };
    
    $scope.editRte = function(){
      $scope.editingRte = {};
    };
    
    $scope.setEditingRte = function(rte){
      $scope.editingRte = angular.copy(rte);
    };
  });