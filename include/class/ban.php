<?php

class ban {

    private function findKey($array, $search) {
        $keys = [];
        foreach($array as $key => $val)
        {
            if ($val[1] === $search)
                array_push($keys, $key);
        }
        return $keys;
    }

    private function getBanID($guid) {
        global $rcon;
        $bans = $rcon->getBanArray();
        $key = null;
        $return = [];
        $keys = $this->findKey($bans, $guid);

        foreach ($keys as $key) {
            array_push($return, $bans[$key]);
        }
        return array_shift($return);
    }

    public function banPlayer($guid, $name, $banned_by, $perm = true, $time = 0) {
        global $db_panel;
        $ban = null;
        sleep(10);
        $ban = $this->getBanID($guid);
        if (!empty($ban) || $ban !== null) {
            //$ban = array_slice($ban, 0, 3);
            if ($perm == true) {
                $db_panel->setBan($guid, $ban[3], $ban[0], $name, $banned_by);
            } else {
                $db_panel->setTBan($guid, $ban[3], $ban[0], $name, $time, $banned_by);
            }
        }
    }
}