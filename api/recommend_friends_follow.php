<?php
/**
 * 我关注的人还关注
 * 按关注数降序排列
 */

require_once 'api_utilities.php';
$con = db_connect();
check_login($con);

$userid = intval(filter($con, $_POST["userid"]));

$result = $con->query("SELECT DISTINCT user.*, COUNT(*) AS num FROM friends AS fri1, friends AS fri2, user WHERE fri1.fan_userid = $userid AND fri1.followed_userid = fri2.fan_userid AND fri2.followed_userid = user.userid AND user.userid NOT IN ($userid)GROUP BY user.userid ORDER BY num DESC");

check_sql_error($con);
if (mysqli_affected_rows($con) == 0) {
    report_error(1, "没有关注");
}
$return = array();
while ($row = mysqli_fetch_array($result)) {
    array_push($return, array(
        "name" => $row["name"],
        "sex" => $row["sex"],
        "icon" => $row["icon"],
    ));
}
report_success($return);