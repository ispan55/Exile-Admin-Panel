<?php

/**
*Copyright (C) 2016-2017  Ballermann96
*
*This program is free software; you can redistribute it and/or modify it under the terms of
*the GNU General Public License as published by the Free Software Foundation; either
*version 3 of the License, or any later version.
*
*This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
*without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*See the GNU General Public License for more details.
*
*You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>.
*/

if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    die("Require PHP 5.5 or higher");
}

require_once('vendor/autoload.php');
use \PageCache\PageCache;
$cache = new PageCache();
$cache->setPath('cache/');
$cache->init();


session_start();
require_once('config.php');
require_once('include/class/functions.php');

$site = null;

if (isset($_GET['site'])) {
    $site = $_GET['site'];
}

$title = '';
if (is_checked_in() == true) {
    if (empty($site)) {
        require_once('include/header.php');
        require_once('sites/dashboard.php');
        require_once('include/footer.php');
        die();
    } elseif ($site == 'territories') {
        $title = ucfirst($site);
        require_once('include/header.php');
        require_once('sites/territories.php');
        require_once('include/footer.php');
        die();
    } elseif ($site == 'vehicles') {
        $title = ucfirst($site);
        require_once('include/header.php');
        require_once('sites/vehicles.php');
        require_once('include/footer.php');
        die();
    } elseif ($site == 'profile') {
        $title = ucfirst($site);
        require_once('include/header.php');
        require_once('sites/profile.php');
        require_once('include/footer.php');
        die();
    } elseif ($site == 'search') {
        $title = ucfirst($site);
        require_once('include/header.php');
        require_once('sites/searchresult.php');
        require_once('include/footer.php');
        die();
    } elseif ($site == 'player') {
        $title = ucfirst($site);
        require_once('include/header.php');
        require_once('include/class/player.php');
        require_once('include/footer.php');
        die();
    } else {
        require_once('pages/examples/404.html');
        die();
    }
} else {
    if (check_user($db_panel) == null) {
        if (!isset($site)) {
            require_once('sites/login.php');
        } else {
            require_once('pages/examples/404.html');
        }
    }
}






