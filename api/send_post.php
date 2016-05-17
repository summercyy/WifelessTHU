<?php
/**
 * Created by PhpStorm.
 * User: Archimekai
 * Date: 5/2/2016
 * Time: 11:26
 */

// TODO 发表状态的数据放在哪个数据库中？
// TODO 是否使用cookie对用户进行跟踪？

require_once "api_utilities.php"
$con = db_connect();
$description = filter($con,$_REQUEST['description']);

$con->query("INSERT")

