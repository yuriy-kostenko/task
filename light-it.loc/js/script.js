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
            max: 25
        },
        xAxis: {
            categories: []
        },        
        series: [{
            name: 'Длина слова',
            data: []
        }],
        title: {
            text: 'Заголовок'
        },
        loading: false
    };
    $scope.$watch('chipher.text', function(newValue, oldValue){
  
        var adata = [];
        var categories =[];

        angular.forEach($scope.chipher.text.split(" "), function(value, key) {
          categories.push(value);
          adata.push(value.length);
        });

        $scope.highchartsNG.xAxis.categories = categories;
        $scope.highchartsNG.series[0].data = adata;
          
        $scope.highchartsNG.title.text = 'График по тексту "'+$scope.chipher.text+'"';

    }, true);

});
