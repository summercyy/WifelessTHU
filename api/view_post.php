<?php

require_once 'api_utilities.php';
$con = db_connect();
check_login($con);

$userid = intval(filter($con, $_POST["userid"]));
$postid = intval(filter($con, $_POST["postid"]));

$result = $con->query("SELECT * FROM post, user WHERE postid = $postid AND post.userid = user.userid");
check_sql_error($con);
if (mysqli_affected_rows($con) == 0) {
	report_error(1, "贴子不存在");
}
$return = array("post" => array(), "comments" => array());
$result = mysqli_fetch_array($result);
$return["post"] = array(
	"name" => $result["name"],
	"icon" => $result["icon"],
	"text" => $result["text"],
	"create_time" => $result["create_time"],
);

$result = $con->query("SELECT * FROM post_images WHERE postid = '$postid'");
check_sql_error($con);
while ($row = mysqli_fetch_array($result)) {
	array_push($return["post"]["images"], $row["image"]);
}

$result = $con->query("SELECT * FROM comment, user WHERE postid = $postid AND comment.userid = user.userid");
while ($row = mysqli_fetch_array($result)) {
	array_push($return["comments"], array(
		"name" => $row["name"],
		"icon" => $row["icon"],
		"text" => $row["text"],
		"create_time" => $row["create_time"],
	));
}
report_success($return);