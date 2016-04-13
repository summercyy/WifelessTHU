<?php
/**
 * Global shared lib for Social.
 */
require_once 'config.php';

// Database connector.
function dbconnect() {
    $con = @mysql_connect(SOCIAL_DB_HOSTNAME, SOCIAL_DB_USERNAME, SOCIAL_DB_PASSWORD) or die("Cannot connect to database!");
    mysql_query("SET NAMES 'UTF8'");
}

?>
