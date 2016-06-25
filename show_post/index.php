<!DOCTYPE html>
<!-- 显示动态详情-->
<html>
<head>
    <meta charset="utf-8">
    <script src="../js/angular.js"></script>
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/cookieAPI.js"></script>
</head>
<body>
<div ng-app="showPost" ng-controller="showPostController">

    动态：{{post_records.name}} {{post_records.text}} {{post_records.create_time}}
<ul>
<li ng-repeat="x in comments_records">
    {{x.name}}
    {{x.text}}
    {{x.create_time}}
</li>
</ul>
<script type="text/javascript">
    $.ajaxSetup({
        async: false
    });
    var postData;
    function getPost(post_to_view){
        userid = getCookie("userid");
        token = getCookie("token");

        if(post_to_view){
            if(post_to_view.length > 0){
                postid
            }
        }
        postid = 1;
        $.post("../api/view_post.php", {"userid":  userid, "token": token, "postid": postid}, function(data){console.log("in getPost: " + data); postData = data;})
        var post_obj = JSON.parse(postData);
        console.log("in getPost: " + postData);
        return post_obj.data
    }
</script>
<script>
    var app = angular.module("showPost", []);
    app.controller("showPostController", function($scope) {
        var post = getPost();
        $scope.post_records = post.post;
        $scope.comments_records = post.comments; 
    });
</script>

</div>
</body>
</html>