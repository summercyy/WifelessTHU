<!-- by Archimekai  用户登陆后的主要页面，用于显示和发表post
 dropzonejs用来支持图片的拖拽上传
 -->
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
</head>
<body>
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
            <strong>The Newist</strong>
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
                    <form action="./api/test_wenkai/var_dump.php" method="get">
                        <input type="text" name="postContent" title="想要发布的内容" class="mdl-cell--8-col">
                        <div id="imageUploadArea" style="background: black">拖拽到此处以上传图片</div>
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
                <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent">
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
                        <strong>The Newist</strong>
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
            <div id="postsContainer">这是存储状态的位置</div>


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
<a href="https://github.com/google/material-design-lite/blob/master/templates/blog/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--white">View Source</a>
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

        switch (cardDataObject.type){
            case "text":
                cardData1.innerHTML ='<div class="mdl-card on-the-road-again mdl-cell mdl-cell--8-col" style="width: 640px">' +
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
    addOneCard(cardData2);
    addOneCard(cardDataImage);
    //    function createTextPostCard(content, posterID, postID) {
    //
    //    }

    // 测试用例

</script>
<script>
    // 用于异步从服务器加载内容
    var getPostRequest = XM

</script>
</html>