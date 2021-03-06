<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="http://apps.bdimg.com/libs/angular.js/1.4.6/angular.min.js"></script>
</head>
<body>

<div ng-app="myApp" ng-controller="customersCtrl">

    <ul>
        <li ng-repeat="x in names">
            {{ x.Name + ', ' + x.Country }}
        </li>
    </ul>

</div>

<script>
    var app = angular.module('myApp', []);
    app.controller('customersCtrl', function($scope, $http) {
        $http.get("http://www.runoob.com/try/angularjs/data/Customers_JSON.php")
            .success(function (response) {$scope.names = response.records;});
    });
</script>

</body>
</html>
