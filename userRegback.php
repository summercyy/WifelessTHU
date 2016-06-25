<?php
/**
 * Created by PhpStorm.
 * User: Archimekai
 * Date: 6/24/2016
 * Time: 12:07
 */
?>

<!--<form name="userRegForm" method="post" action="./test/echoRequest.php">-->
<form name="userRegForm" method="post" action="./api/register.php" enctype="application/x-www-form-urlencoded">
    <p>用户名：<input name="name" value="testuser"></p>
    <p>电子邮箱：<input name="email" value=""></p>
    <p>密码：<input name="password" type="password" value="12345"></p>
    <p  style="display: none"><input name="type" value="Web"></p>
    <p  style="display: none"><input name="sex" value=""></p>
    <p  style="display: none"><input name="icon" value=""></p>
    <p><button type="submit" >注册</button></p>
</form>
