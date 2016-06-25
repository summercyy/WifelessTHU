<head>

<?php

$token = $_COOKIE["token"];

if (strlen($token) == 0) {
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";
} else {
    echo "<meta http-equiv='refresh' content='0; url=homepage.php'>";
}

?>

</head>
