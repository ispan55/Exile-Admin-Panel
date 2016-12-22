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
}