angular.module('scheduleApp', [])
  .controller('MainController', function($scope) {
    $scope.schedules = [{
      timeframe: '8-9',
      times: [{
        open: 1,
        users: [
          {name: "Jing"}
        ]
      }, {
        open: 1,
        users: []
      }, {
        open: 1,
        users: []
      }, {
        open: 1,
        users: []
      }, {
        open: 1,
        users: []
      }, {
        open: 1,
        users: []
      }, {
        open: 0,
        users: []
      }]
    }, {
      timeframe: '9-10',
      times: [{
        open: 1,
        users: []
      }, {
        open: 1,
        users: []
      }, {
        open: 1,
        users: []
      }, {
        open: 1,
        users: []
      }, {
        open: 1,
        users: []
      }, {
        open: 0,
        users: []
      }, {
        open: 0,
        users: []
      }]
    }];

    $scope.openTimeframe = function(i, j, time) {
      if (time.open) {
        $scope.currentTimeFrame = {
          x: i,
          y: j,
          users: time.users
        };
        
        $('#myModal').modal('show');
      }
    };
  });