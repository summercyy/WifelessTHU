<!DOCTYPE html>
<!-- 显示当前登陆用户的好友-->
<html>
<head>
    <meta charset="utf-8">
    <script src="./js/angular.js"></script>
    <script src="./js/jquery-1.12.4.js"></script>
    <script src="./js/cookieAPI.js"></script>
</head>
<body>
<div ng-app="showFriends" ng-controller="showFriendsController">

    关注：
<ul>
<li ng-repeat="x in records">
    {{x.name}}
</li>
</ul>
<script type="text/javascript">
    $.ajaxSetup({
        async: false
    });
    var friendsData;
    function getFriends(){
        userid = getCookie("userid");
        token = getCookie("token");
        viewing_userid = 1;
        $.post("./api/view_following.php", {"userid":  userid, "token": token, "viewing_userid": viewing_userid}, change)
        var friends_obj = JSON.parse(friendsData);
        return friends_obj.data
    }
    function change(data){
        friendsData = data;
    }
</script>
<script>
    var app = angular.module("showFriends", []);
    app.controller("showFriendsController", function($scope) {
        $scope.records = getFriends(); 
    });
</script>

</div>
</body>
</html>