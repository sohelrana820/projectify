var app = angular.module('application', [], function ($interpolateProvider) {

});

app.controller('weatherCtrl', function($scope, $http) {
    $http.get("http://api.openweathermap.org/data/2.5/forecast/daily?id=4350049&mode=&units=metric&cnt=7&appid=062481a2d8b412b7162f8720464518c5")
        .then(function(response) {
            $scope.weather = response.data;
            console.log($scope.weather);
        });

    $http.jsonp('http://finance.yahoo.com/webservice/v1/symbols/GOOG,AAPL,MSFT,FB/quote', {
        params: {
            callback: 'JSON_CALLBACK',
            format: 'json',
            view: '‌​detail'
        }
    }).success(function(response) {
        $scope.stock = response.list.resources;
        console.log($scope.stock);
    });

    $scope.changeStockClass = function(value){
        return (value < 0 ? 'label-important' : 'label-success');
    }
    $scope.CurrentDate = new Date();
});

app.controller('Ctrl2', ['$scope', function ($scope) {
    $scope.format = 'EEEE, MMM d y h:mm:ss a';
}]);

app.directive("myCurrentTime", function(dateFilter){
    return function(scope, element, attrs){
        var format;

        scope.$watch(attrs.myCurrentTime, function(value) {
            format = value;
            updateTime();
        });

        function updateTime(){
            var dt = dateFilter(new Date(), format);
            element.text(dt);
        }

        function updateLater() {
            setTimeout(function() {
                updateTime(); // update DOM
                updateLater(); // schedule another update
            }, 1000);
        }

        updateLater();
    }
});