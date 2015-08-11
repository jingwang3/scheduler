angular.module('scheduleApp', [])
  .controller('MainController', function($scope) {
    $scope.rtes = [{"rte_id":"11","driver_name":"中国人","rte_name":"山手线"}];
    
    $scope.targetRte;
    
    $scope.setTargetRte = function(rte){
      $scope.targetRte = rte;
    };
  });