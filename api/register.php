<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 16/4/25
 * Time: 下午10:30
 */

/**
 * Common functions for Social API.
 */
require_once 'api_utilities.php';
$con = db_connect();

@$token = filter($con, $_POST["token"]);
@$userid = intval(filter($con, $_POST["userid"]));
$name = filter($con, $_POST["name"]);
$password = filter($con, $_POST["password"]);
@$new_password = filter($con, $_POST["new_password"]);
$sex = filter($con, $_POST["sex"]);
$email = filter($con, $_POST["email"]);
$icon = filter($con, $_POST["icon"]);
@$function = filter($con, $_POST["function"]);

if ($function == "edit") {
    check_login($con);
}

if (strlen($name) == 0 || strlen($password) == 0) {
    report_error(ERROR_MISSING_PARAMETER);
}
if (contain_special_chars($name)) {
    report_error(1, "用户名含有特殊字符");
}
if (strlen($name) > 32) {
    report_error(2, "用户名过长");
}
if (!($sex == "male" || $sex == "female")) {
    $sex = "secret";
}
if (strlen($email) > 0 && !is_email($email)) {
    report_error(3, "邮箱格式错误");
}
if (strlen($email) > 128) {
    report_error(4, "邮箱过长");
}
if (!is_random_string($icon, 8)) {
    report_error(5, "图片名不正确");
}

if ($function == "edit") {
    $result = $con->query("SELECT * FROM user WHERE userid = '$userid'");
    check_sql_error($con);
    $result = mysqli_fetch_array($result);
    if (strtoupper(md5($password)) != strtoupper($result["password"])) {
        report_error(6, "密码错误");
    }
}

$result = $con->query("SELECT * FROM user WHERE name = '$name'");
check_sql_error($con);
$result = mysqli_fetch_array($result);
if (!($function == "edit" && $userid == $result["userid"]) && mysqli_affected_rows($con) > 0) {
    report_error(7, "该用户名已被注册");
}

if (strlen($email) > 0) {
    $result = $con->query("SELECT * FROM user WHERE email = '$email'");
    check_sql_error($con);
    $result = mysqli_fetch_array($result);
    if (!($function == "edit" && $userid == $result["userid"]) && mysqli_affected_rows($con) > 0) {
        report_error(8, "该邮箱已被注册");
    }
}

if ($function == "edit") {
    $changed_password = (strlen($new_password) > 0);
    if (!$changed_password) {
        $new_password = $password;
    }
    $pass = md5($new_password);
    $con->query("UPDATE user SET name = '$name', password = '$pass', sex = '$sex', email = '$email', icon = '$icon' WHERE userid = '$userid'");
    check_sql_error($con);
    if ($changed_password) {
        $con->query("DELETE FROM token WHERE userid = '$userid' AND token != '$token'");
        check_sql_error($con);
    }
} else {
    $pass = md5($password);
    $con->query("INSERT INTO user (name, password, sex, email, icon) VALUES ('$name', '$pass', '$sex', '$email', '$icon')");
    check_sql_error($con);
}

if ($function == "edit") {
    report_success();
} else {
    $type = filter($con, $_POST["type"]);
    @$result = request_post("/login.php", array("name" => $name, "password" => $password, "type" => $type));
    report_success(array("userid" => $result["data"]["userid"], "token" => $result["data"]["token"], "name" => $result["data"]["name"]));
}
