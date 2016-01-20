var app = angular.module('myApp', ['highcharts-ng', 'ngAnimate', 'ui.bootstrap']);
app.controller('CollapseCtrl', function ($scope) {
  $scope.isCollapsed = true;
});

app.controller('ChipherController',
    function($scope, $http){
        $scope.response={};
        $scope.save = function (chipher, chipherForm){
            if(chipherForm.$valid){
                chipher.crypt = 'encr';
                $http.post("chipher.php", chipher).success(function (chiph) {
                    $scope.response=chiph;
                });
            }
        };
        $scope.enc = function(chipher, chipherForm){
        $scope.$emit('enc');
          if(chipherForm.$valid){
            chipher.crypt = 'decod';
            $http.post("chipher.php", chipher).success(function (chiph) {
            $scope.response=chiph;             
          });
          }        
        };
    }    
);

app.controller('diagramController', function ($scope) {

    $scope.highchartsNG = {
        options: {
            chart: {
                type: 'column'
            }
        },
        yAxis: {
            max: 15
        },
        xAxis: {
            categories: []
        },        
        series: [{
            name: 'Количество повторений',
            data: []
        }],
        title: {
            text: 'Заголовок'
        },
        loading: false
    };
    $scope.$watch('chipher.text', function(newValue, oldValue){
  
        var adata = [];
        var categories = [ 'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z' ];

        categories.forEach( function(value) {
          adata.push( $scope.chipher.text.split(new RegExp(value, 'i')).length - 1 );
        });

        $scope.highchartsNG.xAxis.categories = categories;
        $scope.highchartsNG.series[0].data = adata;
          
        $scope.highchartsNG.title.text = 'График по тексту "'+$scope.chipher.text+'"';

    }, true);

});
