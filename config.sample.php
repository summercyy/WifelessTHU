<?php
/**
 * Configuration for Social.
 *
 * You need to copy this file to `config.php` to make it work.
 *
 * This file contains the following configrations:
 *
 * - MySQL settings.
 *
 * Reference:
 * - https://github.com/WordPress/WordPress/blob/master/wp-config-sample.php
 */

//** MySQL settings. **//
/** The database username. */
define('SOCIAL_DB_USERNAME', 'database_username_here');

/** The database password. */
define('SOCIAL_DB_PASSWORD', 'database_password_here');

/** The database name. */
define('SOCIAL_DB_NAME', 'database_name_here');

/** The database hostname. */
define('SOCIAL_DB_HOSTNAME', 'localhost');

//** Debug settings. **//
/** Whether server should report errors. */
define('SOCIAL_REPORT_ERRORS', false);

//** Time zone settings. **//
date_default_timezone_set('PRC'); // PRC为“中华人民共和国”
