<?php

define('ROOT_PATH', __DIR__ . '/');

define('HOME_URL', '192.168.178.51');
define('HOME_DIR', '192.168.178.51/');


/**
 * MYSQL PANEL SETTINGS
 *
 *
 */

/** HOSTNAME */
define('DB_PANEL_HOST', 'localhost');

/** USERNAME */
define('DB_PANEL_USER', 'root');

/** PASSWORD */
define('DB_PANEL_PASS', 'alex1998');

/** DATABASE NAME */
define('DB_PANEL_NAME', 'exileadmin');


/**
 * MYSQL EXILE SETTINGS
 *
 *
 */

/** HOSTNAME */
define('DB_EXILE_HOST', 'localhost');

/** USERNAME */
define('DB_EXILE_USER', 'root');

/** PASSWORD */
define('DB_EXILE_PASS', 'alex1998');

/** DATABASE NAME */
define('DB_EXILE_NAME', 'exile');


/**
 * RCON EXILE SETTINGS
 *
 *
 */

/** HOSTNAME */
define('RCON_HOST', '5.189.145.2');

/** USERNAME */
define('RCON_PASS', 'alex1998');

/** PASSWORD */
define('RCON_PORT', 2306);


/**
 * LOAD EXILE DATABASE
 *
 *
 */

require_once('include/db/DatabaseExile.php');
$db_exile = new DatabaseExile(DB_EXILE_HOST, DB_EXILE_USER, DB_EXILE_PASS, DB_EXILE_NAME);

/**
 * LOAD PANEL DATABASE
 *
 *
 */

require_once('include/db/DatabasePanel.php');
$db_panel = new DatabasePanel(DB_PANEL_HOST, DB_PANEL_USER, DB_PANEL_PASS, DB_PANEL_NAME);

/**
 * LOAD RCON
 *
 *
 */

require_once('include/class/Rcon.php');
try {
    $rcon = new Rcon(RCON_HOST, RCON_PASS, RCON_PORT);
} catch (Exception $exception) {
    print $exception;
}
