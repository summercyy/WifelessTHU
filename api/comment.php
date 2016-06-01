<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 16/5/18
 * Time: 下午7:03
 */

/**
 * Common functions for Social API.
 */
require_once 'api_utilities.php';
$con = db_connect();
check_login($con);

$postid = intval(filter($con, $_POST["postid"]));
$userid = intval(filter($con, $_POST["userid"]));
$text = filter($con, $_POST["text"], false);

if (strlen($text) == 0) {
    report_error(1, "评论不能为空");
}
if (strlen($text) > 255) {
    report_error(2, "评论过长");
}
$con->query("SELECT * FROM post WHERE postid = '$postid'");
if (mysqli_affected_rows($con) == 0) {
    report_error(3, "帖子不存在");
}

$con->query("INSERT INTO comment (postid, userid, text) VALUES ('$postid', '$userid', '$text')");
check_sql_error($con);
report_success();