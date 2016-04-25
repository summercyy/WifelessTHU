<?php
/**
 * Global shared lib for Social.
 */
require_once 'config.php';

/**
 * Database connector.
 */
function db_connect() {
    $con = mysqli_connect(SOCIAL_DB_HOSTNAME, SOCIAL_DB_USERNAME, SOCIAL_DB_PASSWORD, SOCIAL_DB_NAME) or die("数据库不存在或用户名密码不正确");
    $con->query("SET NAMES 'UTF8MB4'");
    return $con;
}

?>
