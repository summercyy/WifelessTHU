<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 16/5/18
 * Time: 下午7:02
 */

/**
 * Common functions for Social API.
 */
require_once 'api_utilities.php';
$con = db_connect();
check_login($con);

$userid = intval(filter($con, $_POST["userid"]));
$text = filter($con, $_POST["text"], false);

if (strlen($text) == 0) {
    report_error(1, "正文不能为空");
}
if (strlen($text) > 65535) {
    report_error(2, "正文过长");
}

$con->query("INSERT INTO post (userid, text) VALUES ('$userid', '$text')");
check_sql_error($con);
report_success();
