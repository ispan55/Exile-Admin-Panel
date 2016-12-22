<?php

use voku\db\DB;

require_once($_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");

class DatabaseExile
{
    private $conn;

    public function __construct($host, $user, $pass, $db)
    {
        $this->conn = DB::getInstance($host, $user, $pass, $db);
    }

    public function getAccounts() {
        $query = $this->conn->query("SELECT name, uid, score, deaths, kills, total_connections, first_connect_at, last_connect_at FROM account ORDER BY `score` DESC LIMIT 100;");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function getAccountByUID($uid) {
        $query = $this->conn->query("SELECT * FROM account WHERE uid='$uid';");
        $query->setDefaultResultType("array");
        return array_shift($query->fetchAll());
    }

    public function getPlayerByUID($uid) {
        $query = $this->conn->query("SELECT * FROM player WHERE account_uid='$uid';");
        $query->setDefaultResultType("array");
        return array_shift($query->fetchAll());
    }

    public function getTerritoryByUID($uid) {
        $query = $this->conn->query("SELECT * FROM territory WHERE owner_uid='$uid';");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function updateScore($uid, $score) {
        return $this->conn->update('account', array('score' => $score), array('uid' => $uid));
    }

    public function updateMoney($uid, $money) {
        return $this->conn->update('player', array('money' => $money), array('account_uid' => $uid));
    }

    public function updatePlayer($uid, $hunger, $thirst, $p_weap, $h_weap) {
        return $this->conn->update('player', array('hunger' => $hunger, 'thirst' => $thirst, 'primary_weapon' => $p_weap, 'handgun_weapon' => $h_weap), array('account_uid' => $uid));
    }

    public function deleteVehicle($id) {
        return $this->conn->delete('vehicle', array('id' => $id));
    }

    public function getAccount($search) {
        if (is_numeric($search)) {
            $search = '%'.$search.'%';
            $query = $this->conn->query("SELECT name, uid, score, deaths, kills, total_connections, first_connect_at, last_connect_at FROM account WHERE uid LIKE '$search';");
        } else {
            $search = '%'.$search.'%';
            $query = $this->conn->query("SELECT name, uid, score, deaths, kills, total_connections, first_connect_at, last_connect_at FROM account WHERE name LIKE '$search';");
        }
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function getMoney($uid) {
        $query = $this->conn->query("SELECT money FROM player WHERE account_uid='$uid';");
        $query->setDefaultResultType("array");
        return array_shift($query->fetchAll());
    }

    public function getTerritories() {
        $query = $this->conn->query("SELECT owner_uid, name, radius, level, last_paid_at FROM territory;");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function getVehicles() {
        $query = $this->conn->query("SELECT class, account_uid, is_locked, pin_code FROM vehicle;");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function getVehiclesByUID($uid) {
        $query = $this->conn->query("SELECT id, class, is_locked, pin_code FROM vehicle WHERE account_uid='$uid';");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function sumRespect() {
        $query = $this->conn->query("SELECT SUM(score) AS sum FROM account");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function sumMoney() {
        $query = $this->conn->query("SELECT SUM(money) AS sum FROM player");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function sumTerritories() {
        $query = $this->conn->query("SELECT COUNT(*) AS sum FROM territory");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function sumConstructions() {
        $query = $this->conn->query("SELECT COUNT(*) AS sum FROM construction");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function sumPlayers() {
        $query = $this->conn->query("SELECT SUM(total_connections) AS sum FROM account");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function countPlayers() {
        $query = $this->conn->query("SELECT COUNT(*) AS count FROM account");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function sumVehicles() {
        $query = $this->conn->query("SELECT COUNT(*) AS sum FROM vehicle");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function avgRespect() {
        $query = $this->conn->query("SELECT AVG(score) AS avg FROM account");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function avgMoney() {
        $query = $this->conn->query("SELECT AVG(money) AS avg FROM player");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function lastTerritory() {
        $query = $this->conn->query("SELECT name FROM territory ORDER BY created_at DESC LIMIT 1");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function avgConstructions() {
        $query = $this->conn->query("SELECT AVG(count) avg FROM (SELECT COUNT(*) count FROM construction) avg");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function lastMember() {
        $query = $this->conn->query("SELECT name FROM account ORDER BY first_connect_at DESC LIMIT 1");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

    public function uidToName($uid) {
        $query = $this->conn->query("SELECT name FROM account WHERE uid='$uid';");
        $query->setDefaultResultType("array");
        return $query->fetchAll();
    }

}