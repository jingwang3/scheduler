angular.module('scheduleApp', [])
  .controller('MainController', function($scope) {
    $scope.schedules = [
      {
        timeframe:'8-9',
        times:[
          1,
          1,
          1,
          1,
          1,
          1,
          0
        ]
      },
      {
        timeframe:'9-10',
        times:[
          1,
          1,
          1,
          1,
          1,
          0,
          0
        ]
      }
    ]
  });