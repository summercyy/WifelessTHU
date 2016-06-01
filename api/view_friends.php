<?php
/**
 * Created by PhpStorm.
 * User: summe_000
 * Date: 2016/5/17
 * Time: 23:46
 */

require_once 'api_utilities.php';
$con = db_connect();
check_login($con);

$userid = intval(filter($con, $_POST["userid"]));
$name = filter($con, $_POST["name"]);

if (strlen($name) == 0) {
    report_error(ERROR_MISSING_PARAMETER);
}

$result = $con->query("SELECT * FROM friends, user WHERE friends.first_name = '$name' AND friends.second_name = user.name");
check_sql_error($con);
if (mysqli_affected_rows($con) == 0) {
    report_error(1, "该用户没有关注任何人");
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