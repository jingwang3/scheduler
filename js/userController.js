angular.module('scheduleApp', [])
  .controller('UserController', function($scope, $http) {
    $scope.users = [{"id":"1","name":"赵日天","tel":"300011111","add_1":"魔兽","add_2":"争霸","add_3":"dota"}];
    console.log($scope.users);
    
    // $http.get('http://test.misaka.us/db_driver/get_people.php').
    // then(function(response) {
    //   console.log(response.data);
    // }, function(response) {
    //   console.log('nothing');
    // });
  });