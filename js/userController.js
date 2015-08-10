angular.module('scheduleApp', [])
  .controller('UserController', function($scope, $http) {
    $scope.users = [{"id":"1","name":"赵日天","tel":"300011111","add_1":"魔兽","add_2":"争霸","add_3":"dota"}];
    $scope.selectedUser;
    $scope.activeUser;
    $scope.userIsEdited = false;
    
    $scope.selectUser = function(user){
      $scope.activeUser = user;
      $scope.selectedUser = angular.copy(user);
    };
    
    
    $scope.isSelected = function(user){
      return $scope.activeUser === user;
    };
    
    $scope.userIsEdited = function(){
      console.log();
      if($scope.activeUser){
        return !angular.equals($scope.activeUser, $scope.selectedUser);
      }else{
        return false;
      }
    };
    
    $scope.resetUserEdits = function(){
      $scope.selectedUser = angular.copy($scope.activeUser);
    };
    
    $scope.saveUserEdits = function(){
      for (var prop in $scope.activeUser) {
          if ($scope.activeUser.hasOwnProperty(prop)) {
              $scope.activeUser[prop] = $scope.selectedUser[prop];
          }
      };
    };
    
    $scope.addUser = function(){
      var newUser = angular.copy($scope.users[0]);
      for (var prop in newUser) {
          if (newUser.hasOwnProperty(prop)) {
              newUser[prop] = '';
          }
      };
      newUser.name = "new user"
      $scope.users.push(newUser);
      $scope.selectUser(newUser);
    };
    // $http.get('http://test.misaka.us/db_driver/get_people.php').
    // then(function(response) {
    //   console.log(response.data);
    // }, function(response) {
    //   console.log('nothing');
    // });
  });