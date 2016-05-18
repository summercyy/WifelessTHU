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
$images = filter($con, $_POST["images"]);

if (strlen($text) == 0) {
    report_error(1, "正文不能为空");
}
if (strlen($text) > 65535) {
    report_error(2, "正文过长");
}

if (count(explode(" | ", $images)) > 9) {
    report_error(3, "图片数目过多");
}
foreach (explode(" | ", $images) as $image) {
    if (!is_random_string($image, 8)) {
        report_error(4, "图片名不正确");
    }
}

$con->query("INSERT INTO post (userid, text, images) VALUES ('$userid', '$text', '$images')");
check_sql_error($con);
report_success();
