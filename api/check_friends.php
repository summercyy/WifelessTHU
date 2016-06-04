<?php
/**
 * 检查是否关注了某个用户
 * 需要参数：登录用户的userid（userid），要检查好友关系的用户的userid（viewing_userid）
 * 返回值：关注了返回true，未关注返回false
 */

require_once 'api_utilities.php';
$con = db_connect();
check_login($con);

$userid = intval(filter($con, $_POST["userid"]));
$viewing_userid = intval(filter($con, $_POST["viewing_userid"]));

$result = $con->query("SELECT * FROM friends WHERE friends.fan_userid = $userid AND friends.followed_userid = $viewing_userid");
check_sql_error($con);
report_success((mysqli_affected_rows($con) > 0));