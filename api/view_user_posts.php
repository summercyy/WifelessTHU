<?php
/**
 * 某一用户的状态，分页返回
 */

require_once 'api_utilities.php';
$con = db_connect();
check_login($con);

$userid = intval(filter($con, $_POST["userid"]));
$viewing_userid = intval(filter($con, $_POST["viewing_userid"]));
$start = intval(filter($con, $_POST["start"]));
$per_time = intval(filter($con, $_POST["per_time"]));

$result = $con->query("SELECT post.*, COUNT(commentid) AS num FROM post LEFT JOIN comment ON post.postid=comment.postid WHERE post.userid = $viewing_userid GROUP BY postid ORDER BY create_time DESC LIMIT $start, $per_time");
check_sql_error($con);
$count = mysqli_affected_rows($con);

if ($count == 0) {
    report_error(1, "没有更多状态");
}

$return = array();
while ($row = mysqli_fetch_array($result)) {
    array_push($return, array(
        "text" => $row["text"],
        "images" => $row["images"],
        "comments_num" => $row["num"],
    ));
}
report_success($return);
