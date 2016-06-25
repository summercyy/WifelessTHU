/**
 * Created by wenkaiW10 on 6/26/2016.
 */

/**
 * 将用户头像的路径处理为可以显示在src里面的路径
 * @param iconStr 服务器返回的文件名，不含扩展名。
 * 返回加好相对路径的url
 */
function processIconStr(iconStr){
    if(iconStr){
        if(iconStr.length <= 0){
            return "../images/icon/default.jpg";
        }else{
            return "../images/icon/" + iconStr + ".jpg";
        }
    }
    return "../images/icon/default.jpg";
}