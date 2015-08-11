angular.module('scheduleApp', [])
  .controller('MainController', function($scope) {
    $scope.rtes = [{
      "rte_id": "11",
      "driver_name": "中国人",
      "rte_name": "山手线",
      "pickup": {
        "label": "Pick up",
        "type": 1,
        "guests": []
      },
      "dropoff": {
        "label": "Drop off",
        "type": 2,
        "guests": []
      }
    }];

    $scope.guests = [{
      "id": 0,
      "name": "Jing3",
      "for_pickup": 0,
      "for_dropoff": 0
    }, {
      "id": 1,
      "name": "Jing1",
      "for_pickup": 0,
      "for_dropoff": 0
    }, {
      "id": 3,
      "name": "Jing2",
      "for_pickup": 0,
      "for_dropoff": 0
    }]

    $scope.targetRte;
    $scope.filterExp = {};

    $scope.setTargetRte = function(rte) {
      $scope.targetRte = rte;
    };

    $scope.setTargetTrip = function(trip) {
      $scope.targetTrip = trip;

      if (trip.type === 1) {
        $scope.filterExp = {
          "for_pickup": 0
        };
      }
      else if (trip.type === 2) {
        $scope.filterExp = {
          "for_dropoff": 0
        };
      }
    };

    $scope.scheduleGuest = function(trip, guest) {
      if (trip.type === 1) {
        guest.for_pickup = 1;
      }
      else if (trip.type === 2) {
        guest.for_dropoff = 1;
      }
      trip.guests.push(guest);
    };

    $scope.removeGuest = function(trip, index, guest) {
      if (trip.type === 1) {
        guest.for_pickup = 0;
      }
      else if (trip.type === 2) {
        guest.for_dropoff = 0;
      }
      trip.guests.splice(index, 1);
    };

    $scope.addAll = function(trip) {
      if (trip.type === 1) {
        for (var i = 0; i < $scope.guests.length; i++) {
          if ($scope.guests[i].for_pickup === 0){
            $scope.scheduleGuest(trip, $scope.guests[i]);
          }
        }
      }
      else if (trip.type === 2) {
        for (var i = 0; i < $scope.guests.length; i++) {
          if ($scope.guests[i].for_dropoff === 0){
            $scope.scheduleGuest(trip, $scope.guests[i]);
          }
        }
      }
    };
    
    $scope.removeAll = function(trip) {
      if (trip.type === 1) {
        for (var i = 0; i < trip.guests.length; i++) {
            trip.guests[i].for_pickup = 0;
        }
      }
      else if (trip.type === 2) {
        for (var i = 0; i < trip.guests.length; i++) {
            trip.guests[i].for_dropoff = 0;
        }
      }
      trip.guests = [];
    };
    
    $scope.addAllRound = function(trip) {
      if (trip.type === 1) {
        for (var i = 0; i < $scope.guests.length; i++) {
          if ($scope.guests[i].for_dropoff === 1){
            $scope.scheduleGuest(trip, $scope.guests[i]);
          }
        }
      }
      else if (trip.type === 2) {
        for (var i = 0; i < $scope.guests.length; i++) {
          if ($scope.guests[i].for_pickup === 1){
            $scope.scheduleGuest(trip, $scope.guests[i]);
          }
        }
      }
    };

  });