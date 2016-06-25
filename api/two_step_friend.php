<?php
/**
 * 两步好友路径
 */

require_once 'api_utilities.php';
$con = db_connect();
check_login($con);

$userid = intval(filter($con, $_POST["userid"]));
$target_name = filter($con, $_POST["target_name"]);

$result = $con->query("SELECT user1.* FROM friends AS fri1, friends AS fri2, user AS user1, user AS user2 WHERE fri1.fan_userid = $userid AND fri1.followed_userid = fri2.fan_userid AND fri2.followed_userid = user2.userid AND user2.name = '$target_name' AND fri2.fan_userid = user1.userid");

check_sql_error($con);
if (mysqli_affected_rows($con) == 0) {
    report_error(1, "不是两步以内的好友");
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
