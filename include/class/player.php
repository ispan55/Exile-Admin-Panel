<?php

$error = null;
$user = null;
$money = null;
$player = null;
$session = null;

if (isset($_POST['type']) && !empty($_POST['type']) && isset($_POST['id']) && !empty($_POST['id'])) {
    //require_once(ROOT_PATH . 'include/class/ban.php');
    //$ban = new ban($rcon);

    $type = $_POST['type'];
    $name = $_POST['name'];
    $session = $db_panel->getLoginByID($_SESSION['user_id']);
    $username = $session['username'];
    $guid = uidtoguid($_POST['id']);
    $reason = $_POST['reason'];
    $time = $_POST['time'];
    $players = $rcon->getOnlinePlayers();

    switch ($type) {
        case 'Kick':
            $rcon->kick($guid, $reason);
            break;
        case 'Ban':
            if (in_array($guid, $players)) {
                $rcon->banPlayer($guid, $reason, 0);
            } else {
                $rcon->addBan($guid, $reason, 0);
            }
            //$ban->banPlayer($guid, $name, $username);
            break;
        case 'Temp Ban':
            if (in_array($guid, $players)) {
                $rcon->banPlayer($guid, $reason, $time);
            } else {
                $rcon->addBan($guid, $reason, $time);
            }
            //$ban->banPlayer($guid, $name, $username, false, $time);
            break;
    }
}

if (isset($_POST['uid']) && !empty($_POST['uid'])) {
    $uid = $_POST['uid'];

    if (isset($_POST['updateRecord']) && isset($_POST['hunger']) && isset($_POST['thirst']) && isset($_POST['p_weapon']) && isset($_POST['handgun'])) {
       $db_exile->updatePlayer($uid, $_POST['hunger'], $_POST['thirst'], $_POST['p_weapon'], $_POST['handgun']);
    } elseif (isset($_POST['updateAccount']) && isset($_POST['poptabs']) && isset($_POST['respect'])) {
        $db_exile->updateMoney($uid, $_POST['poptabs']);
        $db_exile->updateScore($uid, $_POST['respect']);
    } elseif (isset($_POST['delete'])) {
        $db_exile->deleteVehicle($_POST['delete']);
    }

    $user = $db_exile->getAccountByUID($uid);
    $money = $db_exile->getMoney($uid);
    $player = $db_exile->getPlayerByUID($uid);
}