<?php

use \Nizarii\ARC;

class Rcon
{
    private $rcon;

    public function __construct($host, $pass, $port)
    {
        $this->rcon = new ARC($host, $pass, $port);
    }

    public function getOnlinePlayers() {
        return $this->rcon->getPlayersArray();
    }

    public function addBan($guid, $reason, $time) {
        if (!is_int($time)) {
            $time = intval($time);
        }
        $this->rcon->addBan($guid, $reason, $time);
    }

    public function banPlayer($guid, $reason, $time) {
        if (!is_int($time)) {
            $time = intval($time);
        }
        $this->rcon->banPlayer($guid, $reason, $time);
    }

    public function kick($guid, $reason) {
        $this->rcon->kickPlayer($guid, $reason);
    }

    public function getBanArray() {
        return $this->rcon->getBansArray();
    }
}