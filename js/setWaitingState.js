/**
 * Created by wenkaiW10 on 6/26/2016.
 */
// 用于在页面完全加载好之前显示提示信息
function setWaitingState(){
    var cardData = document.createElement("div");
    cardData.innerHTML ='<div class="mdl-card on-the-road-again mdl-cell mdl-cell--8-col" style="width: 640px" id="waitingCard">' +
        '<div class="mdl-color-text--grey-600 mdl-card__supporting-text">' +
        'TA有点懒，什么也没说过 >_<' +  // 此处存放文字
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
