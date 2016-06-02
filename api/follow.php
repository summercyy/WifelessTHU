<?php
/**
 * 关注某一用户
 */

require_once 'api_utilities.php';
$con = db_connect();
check_login($con);

$userid = intval(filter($con, $_POST["userid"]));
$tofollow_userid = intval(filter($con, $_POST["tofollow_userid"]));

$con->query("SELECT * FROM friends WHERE fan_userid=$userid AND followed_userid = $tofollow_userid");
if (mysqli_affected_rows($con) == 1) {
    report_error(1, "已经关注");
}

$con->query("INSERT INTO friends (fan_userid, followed_userid) VALUES ($userid, $tofollow_userid)");
check_sql_error($con);
report_success();