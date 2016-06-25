<!-- by Archimekai  用户登陆后的主要页面，用于显示和发表post

 dropzonejs用来支持图片的拖拽上传
 -->
<!--获取token和userid-->
<?php
// 这样藏在网页里好吗？
// 测试链接：http://localhost/homepage.php?userid=2&token=BwP8zhkKPaNLC3bJ
$token = $_REQUEST["token"];
$userID = $_REQUEST["userid"];
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>欢迎来到 Wifeless THU</title>
    <link rel="stylesheet" href="css/blogRoboto.css">
    <link rel="stylesheet" href="css/material_icon.css">
    <link rel="stylesheet" href="css/material.indigo-pink.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="custom.css">
    <link rel="script" href="js/material.min.js">
    <link rel="script" href="./path/to/dropzone.js">
    <style>
        /*  */
        .on-card-button{
            float: left;
            list-style: none;
            margin-left: 2px;
        }
    </style>
    <script src="./js/jquery-1.12.4.js"></script>
</head>
<body>
<!--用于在网页中存放用户信息-->

<form name="userInfo" style="display: none">
    <input name="token" value="<?PHP echo $token?>" style="display: none">
    <input name="userid" value="<?PHP echo $userID?>" style="display: none">
</form>

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
                    <form action="./api/post.php" method="post" enctype="application/x-www-form-urlencoded">
                        <input type="text" name="text" title="想要发布的内容" class="mdl-cell--8-col">
                        <div id="imageUploadArea" style="background: black">拖拽到此处以上传图片</div>
                        <input name="token" value="<?PHP echo $token?>" style="display: none">
                        <input name="userid" value="<?PHP echo $userID?>" style="display: none">
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
                <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent" onclick="alert('addFriendClicked'); addFriend();">
                    <i class="material-icons mdl-color-text--white" role="presentation">add</i>
                    <span class="visuallyhidden">add</span>
                </button>
                <div class="mdl-card__media mdl-color--white mdl-color-text--grey-600">
                    <img src="images/image/logo_sample_64.png">   <!-- TODO 统一为用css控制 -->
                    关注：130 | 粉丝：140 | 微博：150<br>
                    好友推荐：
                </div>
                <div class="mdl-card__supporting-text meta meta--fill mdl-color-text--grey-600">
                    <div>
                        <strong><span name="userNameSpan">加载中</span></strong>
                    </div>
                    <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="menubtn">
                        <li class="mdl-menu__item">About</li>
                        <li class="mdl-menu__item">Message</li>
                        <li class="mdl-menu__item">Favorite</li>
                        <li class="mdl-menu__item">Search</li>
                    </ul>
                    <button id="menubtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation">more_vert</i>
                        <span class="visuallyhidden">show menu</span>
                    </button>
                </div>
            </div>
            <div id="haveNewPost" onclick="location.reload(true)">暂时没有新动态。此行字应该隐藏掉。</div>
            <div id="postsContainer">这是存储状态的位置</div>
            <div id="loadMore" onclick="loadMore()">加载更多</div>


        <footer class="mdl-mini-footer">
            <div class="mdl-mini-footer--left-section">
                <button class="mdl-mini-footer--social-btn social-btn social-btn__twitter">
                    <span class="visuallyhidden">Twitter</span>
                </button>
                <button class="mdl-mini-footer--social-btn social-btn social-btn__blogger">
                    <span class="visuallyhidden">Facebook</span>
                </button>
                <button class="mdl-mini-footer--social-btn social-btn social-btn__gplus">
                    <span class="visuallyhidden">Google Plus</span>
                </button>
            </div>
            <div class="mdl-mini-footer--right-section">
                <button class="mdl-mini-footer--social-btn social-btn__share">
                    <i class="material-icons" role="presentation">share</i>
                    <span class="visuallyhidden">share</span>
                </button>
            </div>
        </footer>
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
//    var myDropZone = new Dropzone("#imageUploadArea",{url: "./api/test_wenkai/handle_post_image.php"})
</script>
<script>
    imagePostNode = document.getElementById("imagePostExample");
    textPostNode = document.getElementById("textPostExample");
    function addOneCard(cardDataObject) {
        var cardData1 = document.createElement("div");
        console.log("in addOneCard: " + JSON.stringify(cardDataObject));
//        console.log()
        switch (cardDataObject.type){
            case "text":
                cardData1.innerHTML ='<div class="mdl-card on-the-road-again mdl-cell mdl-cell--8-col" style="width: 640px">' +
                    '<div class="mdl-color-text--grey-600 mdl-card__supporting-text">' +
                    cardDataObject.text +  // 此处存放文字
                    '</div>' +
                    '<div class="mdl-card__supporting-text meta mdl-color-text--grey-600">'+
                    '<div class="minilogo"></div> '+
                    '<div>'+
                    '<strong>' + cardDataObject.poster + '</strong>'+  // 发布者名称
                    '<span>2 days ago</span>'+
                    '</div>'+
                    '<div>'+
                    '<ul>        <li class="on-card-button">            赞            </li>            <li class="on-card-button">            评论            </li>            </ul>'+
                    '</div>'+
                    '</div>'+
                    '</div>';
                    break;
            case "textAndImage":
                cardData1.innerHTML ='<div class="mdl-card on-the-road-again mdl-cell mdl-cell--8-col" style="width: 640px">' +  //TODO 解决宽度不能自适应的问题
                    '<div class="mdl-card__title mdl-color-text--grey-50" style="background: url('+
                    cardDataObject.imageUrl + //最好是绝对路径，否则可能找不到
                    ')">'+
                    '</div>'+
                    '<div class="mdl-color-text--grey-600 mdl-card__supporting-text">' +
                    cardDataObject.textContent +  // 此处存放文字
                    '</div>' +
                    '<div class="mdl-card__supporting-text meta mdl-color-text--grey-600">'+
                    '<div class="minilogo"></div> '+
                    '<div>'+
                    '<strong>' + cardDataObject.poster.posterName + '</strong>'+  // 发布者名称
                    '<span>2 days ago</span>'+
                    '</div>'+
                    '<div>'+
                    '<ul>        <li class="on-card-button">            赞            </li>            <li class="on-card-button">            评论            </li>            </ul>'+
                    '</div>'+
                    '</div>'+
                    '</div>';

                break;
            default:
                throw "Invalid cardDataObject type";
        }
//        thisNode.style.display = "block";
//        thisNode.firstChild.firstChild.innerHTML = cardDataObject.textContent;
//        thisNode.getElementById("cardText").innerHTML = cardDataObject.textContent;
//        thisNode.firstChild.nextSibling.firstChild.nextSibling.innerHTML = cardDataObject.textContent;

        var postContainer = document.getElementById("postsContainer");
        postContainer.appendChild(cardData1);
//        postContainer.appendChild(thisNode);
//        cardNode = document.createElement("div");



    }

    var cardData2 = {
        type: "text",
        poster : {
            posterID : "123",
            posterName: "Saber",
            posterIconUrl: "./images/testImage/logo_sample_64.png"
        },
        textContent : "今天天气不错。",
        postID : "456"
    };
    var cardDataImage = {
        type: "textAndImage",
        poster:{
            posterID : "123",
            posterName: "Saber",
            posterIconUrl: "./images/testImage/logo_sample_64.png"
        },
        textContent : "这张图挺漂亮的。",
        imageUrl : "./images/testImage/fate.jpeg"
    };

    // 设置节点
//    addOneCard(cardData2);
//    addOneCard(cardDataImage);
    //    function createTextPostCard(content, posterID, postID) {
    //
    //    }

    // 测试用例

</script>

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
            '<ul>        <li class="on-card-button">            赞            </li>            <li class="on-card-button">            评论            </li>            </ul>'+
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

        for (var i = 0; i < data.data.length; i++) {
            cardData = data.data[i];
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

        $.post("./api/view_user_posts.php",{"token": "<?PHP echo $token?>", "userid":"<?PHP echo $userID?>", "start": startIndex, "per_time":itermsPertime, "viewing_userid":"<?PHP echo $userID?>"}, function(data){console.log("dataLoaded: " + data); isAddSuccessful = addCardFromJson(data)});
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
    $(window).scroll(function(){console.log("scorll event2");})
</script>

<script>
    /**
     * 检查页面中是否有新动态
     */
</script>

<script>
    /**
     * 在加载完成后更新页面中的元素，此函数会更新所有userNameSpan中的内容
     */
    function updateUserName(){
        var nodeList = document.getElementsByName("userNameSpan");
        for (var node in nodeList){

        }
    }

    var storeUserName={
        "uptodate": false,
        "content": ""
    };
    function getUserName{
        if(storeUserName.uptodate){
            return storeUserName.content;
        }else{
            $.post("./api/")
        }
    }
</script>

</html>