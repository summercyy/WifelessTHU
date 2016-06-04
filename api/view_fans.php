<?php

require_once 'api_utilities.php';
$con = db_connect();
//check_login($con);

$viewing_userid = intval(filter($con, $_POST["viewing_userid"]));
$viewing_userid = 1;

$result = $con->query("SELECT user.* FROM friends, user WHERE friends.followed_userid = $viewing_userid AND friends.fan_userid = user.userid");
check_sql_error($con);
if (mysqli_affected_rows($con) == 0) {
    report_error(1, "该用户目前还没有粉丝");
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