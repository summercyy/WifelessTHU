<!DOCTYPE html>
<!-- 显示当前用户的好友（粉丝）-->
<html>
<head>
    <meta charset="utf-8">
    <script src="./js/angular.js"></script>
    <script src="./js/jquery-1.12.4.js"></script>
</head>
<body>
<div ng-app="showFans" ng-controller="showFansController">

    粉丝：
<ul>
<li ng-repeat="x in records">
    {{x.name}}
</li>
</ul>
<script type="text/javascript">
    var fansData;
    function getFans(){
        userid = 1;
        token = 111;
        viewing_userid = 1;
        $.post("./api/view_fans.php", {"userid":  userid, "token": token, "viewing_userid": viewing_userid}, function(data){console.log("in getFans: " + data); fansData = data;})
        var fans_obj = JSON.parse(fansData);
        return fans_obj.data
    }
</script>
<script>
    var app = angular.module("showFans", []);
    app.controller("showFansController", function($scope) {
        $scope.records = getFans()
    });
</script>

</div>
</body>
</html>