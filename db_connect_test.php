<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>数据库连接测试</title>
</head>

<body>
<h1 align="center">
    <?php
    require_once "db_connect.php";
    if (!mysqli_error(db_connect())) {
        echo "数据库连接成功";
    }else {
        echo "数据库连接失败";
    }
    ?>
</h1>
</body>

</html>
