<?php
/**
 * 某一用户的状态数量
 */

require_once 'api_utilities.php';
$con = db_connect();
//check_login($con);

$userid = intval(filter($con, $_POST["userid"]));
$viewing_userid = intval(filter($con, $_POST["viewing_userid"]));
$viewing_userid = 7;

$result = $con->query("SELECT * FROM post WHERE post.userid = $viewing_userid");
check_sql_error($con);
$count = mysqli_affected_rows($con);

$return = array("count" => $count);

report_success($return);
