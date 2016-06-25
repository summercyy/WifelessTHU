<?php
/**
 * 按关注数降序排列
 */
require_once 'api_utilities.php';
$con = db_connect();
check_login($con);

$userid = intval(filter($con, $_POST["userid"]));

$result = $con->query("SELECT DISTINCT user.*, COUNT(*) AS num FROM friends AS fri1, friends AS fri2, user 
WHERE ((fri1.followed_userid = $userid AND fri1.fan_userid = fri2.fan_userid)
OR (fri1.fan_userid = $userid AND fri1.followed_userid = fri2.fan_userid))
AND fri2.followed_userid = user.userid AND user.userid NOT IN ($userid)
AND user.userid NOT IN (SELECT followed_userid FROM friends WHERE fan_userid = $userid)
GROUP BY user.userid ORDER BY num DESC");

check_sql_error($con);

$return = array();
while ($row = mysqli_fetch_array($result)) {
    array_push($return, array(
        "userid" => $row["userid"],
        "name" => $row["name"],
        "sex" => $row["sex"],
        "icon" => $row["icon"],
    ));
}
report_success($return);
