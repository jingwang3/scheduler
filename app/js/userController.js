angular.module('scheduleApp', [])
  .controller('UserController', function($scope, $http) {
    $scope.view = {name: "user"};
    $scope.selectedUser;
    $scope.activeUser;
    $scope.userIsEdited = false;

    $scope.loadUsers = function(){
      $http.get('/db_driver/get_people.php').
      then(function(response) {
        // this callback will be called asynchronously
        // when the response is available
        $scope.users = response.data;
      }, function(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
        console.log(response.status);
      });   
    }

    $scope.loadUsers();

    $scope.selectUser = function(user) {
      $scope.activeUser = user;
      $scope.selectedUser = angular.copy(user);
    };

    $scope.isSelected = function(user) {
      return $scope.activeUser === user;
    };

    $scope.userIsEdited = function() {
      if ($scope.activeUser) {
        return !angular.equals($scope.activeUser, $scope.selectedUser);
      }
      else {
        return false;
      }
    };

    $scope.resetUserEdits = function() {
      $scope.selectedUser = angular.copy($scope.activeUser);
    };

    $scope.saveUserEdits = function() {
      $http.post('/db_driver/add_person.php', $scope.selectedUser, {
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
        }
      }).
      then(function(response) {
        // this callback will be called asynchronously
        // when the response is available
        for (var prop in $scope.activeUser) {
          if ($scope.activeUser.hasOwnProperty(prop)) {
            $scope.activeUser[prop] = $scope.selectedUser[prop];
          }
        };
      }, function(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
      });
    };

    $scope.addUser = function() {
      var newUser = angular.copy($scope.users[0]);
      for (var prop in newUser) {
        if (newUser.hasOwnProperty(prop)) {
          newUser[prop] = '';
        }
      };
      newUser.name = "new user";
      $scope.users.push(newUser);
      $scope.selectUser(newUser);
    };
    
    $scope.removeUser = function() {
      $http.post('/db_driver/delete_person.php', $scope.selectedUser, {
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
        }
      }).
      then(function(response) {
        // this callback will be called asynchronously
        // when the response is available
        $scope.loadUsers();
        $scope.selectUser(null);
      }, function(response) {
        // called asynchronously if an error occurs
        // or server returns response with an error status.
      });
    };
    // $http.get('http://test.misaka.us/db_driver/get_people.php').
    // then(function(response) {
    //   console.log(response.data);
    // }, function(response) {
    //   console.log('nothing');
    // });
  });