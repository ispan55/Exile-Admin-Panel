<?php

$error = null;
$user = null;
$money = null;
$player = null;
if (isset($_POST['uid'])) {
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
    require_once(ROOT_PATH . 'sites/player.php');
}