<?php
/**
 * 两步好友路径
 */

require_once 'api_utilities.php';
$con = db_connect();
check_login($con);

$userid = intval(filter($con, $_POST["userid"]));
$target_id = filter($con, $_POST["target_id"]);

$result = $con->query("SELECT user.* FROM friends AS fri1, friends AS fri2, user WHERE fri1.fan_userid = $userid AND fri1.followed_userid = fri2.fan_userid AND fri2.followed_userid = $target_id AND fri2.fan_userid = user.userid");

check_sql_error($con);

$return = array();
while ($row = mysqli_fetch_array($result)) {
    array_push($return, array(
        "name" => $row["name"],
        "sex" => $row["sex"],
        "icon" => $row["icon"],
    ));
}
report_success($return);
