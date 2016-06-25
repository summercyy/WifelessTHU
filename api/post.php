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

$imageArray = null;
if (strlen($images) > 0) {
    $imageArray = explode(" | ", $images);
    if (count($imageArray) > 9) {
        report_error(3, "图片数目过多");
    }
    foreach ($imageArray as $image) {
        if (!is_random_string($image, 8)) {
            report_error(4, "图片名不正确");
        }
    }
}

$con->autocommit(false);
$con->query("INSERT INTO post (userid, text) VALUES ('$userid', '$text')");
check_sql_error($con);

$postid = mysqli_insert_id($con);
if (count($imageArray) > 0) {
    foreach ($imageArray as $image) {
        $con->query("INSERT INTO post_images (postid, image) VALUES ('$postid', '$image')");
        check_sql_error($con);
    }
}
$con->autocommit(true);
$con->commit();
report_success(array("postid" => $postid));
