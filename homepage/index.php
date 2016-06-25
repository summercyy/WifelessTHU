<!-- by Archimekai  用户登陆后的主要页面，用于显示和发表post

 dropzonejs用来支持图片的拖拽上传
 -->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>欢迎来到 Wifeless THU</title>
    <link rel="stylesheet" href="../css/blogRoboto.css">
    <link rel="stylesheet" href="../css/material_icon.css">
    <link rel="stylesheet" href="../css/material.indigo-pink.min.css">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../custom.css">
    <link rel="script" href="../js/material.min.js">
    <link rel="script" href="path/to/dropzone.js">
    <style>
        /*  */
        .on-card-button{
            float: left;
            list-style: none;
            margin-left: 2px;
        }
    </style>
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/cookieAPI.js"></script>
</head>
<body background="../bg.jpg">


<div class="mdl-card amazing mdl-cell mdl-cell--8-col" id="imagePostExample" style="display: none">
    <div class="mdl-card__title mdl-color-text--grey-50" style="background: url(images/testImage/fate.jpeg)">
        <span id = "cardText"> 这是有图片的展示页 </span>
    </div>
    <div class="mdl-card__supporting-text mdl-color-text--grey-600">
        Enim labore aliqua consequat ut quis ad occaecat aliquip incididunt. Sunt nulla eu enim irure enim nostrud aliqua consectetur ad consectetur sunt ullamco officia. Ex officia laborum et consequat duis.
    </div>
    <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
        <div class="minilogo"></div>
        <div>
            <strong><span id="userNameShow">The Newist</span></strong>
            <span>2 days ago</span>
        </div>
    </div>
</div>
<div class="mdl-card on-the-road-again mdl-cell mdl-cell--8-col" id="textPostExample" style="display: none">
    <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
        <span id = "cardText"> 这是只有文字的展示页 </span>
    </div>
    <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
        <div class="minilogo"></div>
        <div>
            <strong>The Newist</strong>
            <span>2 days ago</span>
        </div>
        <div>
            <ul>
                <li class="on-card-button">
                    赞
                </li>
                <li class="on-card-button">
                    评论
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
    <main class="mdl-layout__content">
        <div class="demo-blog__posts mdl-grid">
            <div class="mdl-card coffee-pic mdl-cell mdl-cell--8-col">
                <div class="mdl-card__media mdl-color-text--grey-50">
<!--                    <form action="./test/echoRequest.php" method="post">-->
                    <form action="../api/post.php" method="post" enctype="application/x-www-form-urlencoded">
                        想说点什么？<input type="text" name="text" title="想要发布的内容" class="mdl-cell--8-col" >
                        <div id="imageUploadArea" style="background: black">拖拽到此处以上传图片</div>
                        <input name="token" id="tokenStore" value="" style="display: none">
                        <input name="userid" id="useridStore" value="" style="display: none">
                        <input name="images" value="">
                        <input type="submit" name="发布">
                    </form>
                    <h3>发表框</h3>
                </div>
                <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
                    <div class="minilogo"></div>
                    <div>
                        <strong>The Newist</strong>
                        <span>2 days ago</span>
                    </div>
                </div>
            </div>
            <div class="mdl-card something-else mdl-cell mdl-cell--8-col mdl-cell--4-col-desktop">
                <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent" onclick=" addFriend('');">
                    <i class="material-icons mdl-color-text--white" role="presentation" style="font-size: medium">关注</i>
                    <span class="visuallyhidden">add</span>
                </button>
                <div class="mdl-card__media mdl-color--white mdl-color-text--grey-600">
                    <img src="../images/image/logo_sample_64.png">   <!-- TODO 统一为用css控制 -->
                    <br />
                    <h4>好友推荐：</h4>
                    <div id="recommend_friends">加载好友推荐中</div>
                </div>
                <div class="mdl-card__supporting-text meta meta--fill mdl-color-text--grey-600">
                    <div>
                        <input id="search_user" style="height: 25px;font-size:small" placeholder="搜索用户" onkeydown="enterHandler(window.event);" />
                    </div>
                    <ul class="mdl-menu mdl-js-menu mdl-menu--top-left mdl-js-ripple-effect" for="menubtn">
                        <li class="mdl-menu__item">About</li>
                        <li class="mdl-menu__item">Message</li>
                        <li class="mdl-menu__item">Favorite</li>
                        <li class="mdl-menu__item">Search</li>
                    </ul>
                    <button id="menubtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation" style="font-size: small">更多</i>
                        <span class="visuallyhidden">show menu</span>
                    </button>
                </div>
            </div>
            <button id="haveNewPost" onclick="location.reload(true)" style="display: none">主人，您有新动态了~~ 点我刷新</button>
            <div id="postsContainer" >这是存储状态的位置</div>
            <div id="loadMore" onclick="loadMore()">加载更多</div>

    </main>
    <div class="mdl-layout__obfuscator"></div>
</div>
<!--<a href="https://github.com/google/material-design-lite/blob/master/templates/blog/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--white">View Source</a>-->
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</body>
<script>
    Array.prototype.forEach.call(document.querySelectorAll('.mdl-card__media'), function(el) {
        var link = el.querySelector('a');
        if(!link) {
            return;
        }
        var target = link.getAttribute('href');
        if(!target) {
            return;
        }
        el.addEventListener('click', function() {
            location.href = target;
        });
    });
</script>
<script>
    // 用于设置拖拽上传图片
//    var myDropZone = new Dropzone("#imageUploadArea",{url: "../api/test_wenkai/handle_post_image.php"})
</script>
<script src="../js/addOneCard.js"></script>

<script>
    // 用于在页面完全加载好之前显示提示信息
    function setWaitingState(){
        var cardData = document.createElement("div");
        cardData.innerHTML ='<div class="mdl-card on-the-road-again mdl-cell mdl-cell--8-col" style="width: 640px" id="waitingCard">' +
            '<div class="mdl-color-text--grey-600 mdl-card__supporting-text">' +
            '加载中，请稍候' +  // 此处存放文字
            '</div>' +
            '<div class="mdl-card__supporting-text meta mdl-color-text--grey-600">'+
            '<div class="minilogo"></div> '+
            '<div>'+
            '<strong>' +  ' ' + '</strong>'+  // 发布者名称
            '<span> </span>'+
            '</div>'+
            '<div>'+
            '<ul>   <li class="on-card-button">            评论            </li>            </ul>'+
            '</div>'+
            '</div>'+
            '</div>';
        var postContainer = document.getElementById("postsContainer");
        postContainer.appendChild(cardData);
    }
    function removeWaitingState() {
        document.removeChild(document.getElementById("waitingCard"));
    }
    setWaitingState();
</script>
<script>
    function addCardFromJson(jsondata) {
        document.getElementById("waitingCard").style.display = "none";
        var data = JSON.parse(jsondata);
        console.log("in addcardfromjson" + JSON.stringify(data.data));
        if (data.code != 0) return false;

        for (var i = 0; i < data.data.posts.length; i++) {
            cardData = data.data.posts[i];
//            console.log("in addcardfromjson" + JSON.stringify(cardData));
            if (cardData.images) {
                if (cardData.images[0])
                    cardData["type"] = "textAndImage";
                else
                    cardData["type"] = "text";
            } else {
                cardData["type"] = "text";
            }
            addOneCard(cardData);
        }
        return true;
    }

</script>
<script>
    // 用于异步从服务器加载内容
    startIndex = 0;
    itermsPertime = 10;
    isAddSuccessful = true;
    function autoload(startIndex) {
        $.ajaxSetup({async: false});
        $.post("../api/view_friends_posts.php",
            {
                "token": getCookie("token"),
                "userid": getCookie("userid"),
                "start": startIndex,
                "per_time":itermsPertime
//                "viewing_userid": getCookie("userid")
            },
            function(data){console.log("dataLoaded: " + data); isAddSuccessful = addCardFromJson(data)});  // 添加type参数为application/x-www-form-urlencoded后就会出现问题，不知道为什么
        console.log("isAddSuccessful: " + isAddSuccessful);
        if(isAddSuccessful){
            return startIndex + itermsPertime;
        }else{
            return -1;
        }
    }
   startIndex = autoload(startIndex);
</script>
<script>
    function loadMore() {
        console.log("startIndex: "+ startIndex);
        if(startIndex == -1){
            document.getElementById("loadMore").innerHTML = "没有更多了";
        }else{
            startIndex = autoload(startIndex);
        }
    }
</script>

<script>
    function addRecommend(jsondata) {
        var data = JSON.parse(jsondata);
        console.log("in addrecommendfromjson" + JSON.stringify(data.data));
        if (data.code != 0) {
            document.getElementById("recommend_friends").innerHTML = "加载用户推荐失败";
            return false;
        }
        var recommendHTML = "";
        for (var i = 0; i < Math.min(data.data.length, 4); i++) {
            recommendData = data.data[i];
            HTMLString = "<div onclick='' style='width: 50px; height: 60px; float: left; background-color: silver; margin: 5px'>"
                + "<span style='text-align: center'>" + recommendData["name"] + "</span>"
                + "<button onclick='addFriend("+ recommendData["userid"] +")'>关注</button>"
                + "</div>";
            recommendHTML += HTMLString;
        }
        if (recommendHTML.length == 0) {
            recommendHTML = "没有推荐的用户";
        }
        document.getElementById("recommend_friends").innerHTML = recommendHTML;
        return true;
    }
</script>

<script>
    isRecommendSuccessful = true;
    function loadRecommend() {
        $.post("../api/recommend_friends.php",
            {
                "token": getCookie("token"),
                "userid": getCookie("userid")
            },
            function(data){console.log("dataLoaded: " + data); isRecommendSuccessful = addRecommend(data)});  // 添加type参数为application/x-www-form-urlencoded后就会出现问题，不知道为什么
        console.log("isRecommendSuccessful: " + isRecommendSuccessful);
    }
    loadRecommend();
</script>

<script>
    $(window).scroll(function(){console.log("scorll event2");})
</script>

<script>
    /**
     * 在加载完成后更新页面中的元素，此函数会更新所有userNameSpan中的内容
     */
    function updateUserName(){
        var nodeList = document.getElementsByName("userNameSpan");
        for (var node in nodeList){
            console.log("jaah");
        }
    }

    var storeUserName={
        "uptodate": false,
        "content": ""
    };
    function getUserName(){
        if(storeUserName.uptodate){
            return storeUserName.content;
        }else{
            $.post("../api/")
        }
    }
</script>

<script>
    /**
     * 添加好友：从当前的登陆用户发出添加好友申请到
     */
    // 从url中获取参数
    function getQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]); return null;
    }

    function addFriend(tofollow_userid) {
        var userid = getCookie("userid");
        var token = getCookie("token");
        if(tofollow_userid.length <= 0){
            console.log("in addFriend: parameter tofollow_userid needed");
            tofollow_userid = userid;
        }
        $.post("../api/follow.php", {
            "userid": userid, 
            "token": token,
            "tofollow_userid": tofollow_userid
        },function (data) {
            console.log("in addFriend: " + data);
            var dataObj = JSON.parse(data);
            if(dataObj.code == 0) {
                alert("关注成功！");
            }else{
                alert("操作错误！错误码：" + dataObj.code + "     提示信息：" + dataObj.message);
            }
            }
        )
    }

</script>
<script>
    function checkLatestPostID(){
        var latestPostID = -1;
        $.ajaxSetup({aysnc: false});
        $.post("../api/view_friends_posts.php", {
            "start": '0',
            "per_time": '1',
            "userid": getCookie("userid"),
            "token": getCookie("token")
        }, function (data) {
            dataObj = JSON.parse(data);
            if(dataObj.code != 0) {
                latestPostID = -1;
                console.log("in checkLatestPostID: " + "动态获取错误");
            }else{ // 成功获取到了动态数据
                latestPostID = dataObj.data.posts[0].postid;
                console.log("thisPostID: " + latestPostID);
            }
        });
        return latestPostID;
    }

    /**
     * 页面初始化
     * 需要已经存在的变量：
     */
    var previousLatestPostID = -1;
    function pageInitialize(){
//        document.getElementById("havaNewPost")
        // 设置发布表格信息
        document.getElementById("tokenStore").value = getCookie("token");
        document.getElementById("useridStore").value = getCookie("userid");
        console.log("in pageInitialize: useridStore= " + document.getElementById("useridStore").value );
        previousLatestPostID = checkLatestPostID();
    }
    pageInitialize();
</script>
<script>
    /**
     * 检查页面中是否有新动态
     * 如果有的话就更新页面中的提示信息
     */
    function checkNewPost() {
        console.log("checkNewPost called");
        var thisID = checkLatestPostID();
        if(thisID > previousLatestPostID){
            previousLatestPostID = thisID;
            // 更新页面信息
            document.getElementById("haveNewPost").style.display = "block";
            return true;
        }else{
            return false;
        }
    }
    setInterval(checkNewPost, 30000);

</script>
<script>
    function enterHandler(event)
    {
        var keyCode = event.keyCode ? event.keyCode
            : event.which ? event.which
            : event.charCode;
        if (keyCode == 13) { // 回车
            var searchname = document.getElementById("search_user").value;
            window.open("../view_user/?name=" + searchname);
        }
    }
</script>

</html>