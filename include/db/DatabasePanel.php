<?php

use voku\db\DB;

require_once($_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php");

class DatabasePanel
{

    private $conn;

    public function __construct($host, $user, $pass, $db)
    {
        $this->conn = DB::getInstance($host, $user, $pass, $db);
    }

    public function getLogin($email)
    {
        $query = $this->conn->query("SELECT * FROM accounts WHERE email='$email'");
        $query->setDefaultResultType("array");
        return array_shift($query->fetchAll());
    }

    public function getLoginByID($id)
    {
        $query = $this->conn->query("SELECT * FROM accounts WHERE id='$id'");
        $query->setDefaultResultType("array");
        return array_shift($query->fetchAll());
    }

    public function setLogin($email, $user, $pass)
    {
        $array = [
            'email' => $email,
            'username' => $user,
            'password' => $pass
        ];
        return $this->conn->insert('accounts', $array);
    }

    public function updateProfile($name, $username, $id)
    {
        $array = [
            'name' => $name,
            'username' => $username,
            'updated_at' => 'CURRENT_TIMESTAMP()'
        ];
        $where = [
            'id' => $id
        ];
        return $this->conn->update('accounts', $array, $where);
    }

    public function updateProfileImage($path, $id)
    {
        $array = [
            'path' => $path,
            'updated_at' => 'CURRENT_TIMESTAMP()'
        ];
        $where = [
            'id' => $id
        ];
        return $this->conn->update('accounts', $array, $where);
    }

    public function setToken($id, $identifier, $securitytoken)
    {
        $array = [
            'user_id' => $id,
            'identifier' => $identifier,
            'securitytoken' => $securitytoken
        ];
        return $this->conn->insert('securitytokens', $array);
    }

    public function getToken($identifier)
    {
        $query = $this->conn->query("SELECT * FROM securitytokens WHERE identifier = '$identifier'");
        $query->setDefaultResultType("array");
        return array_shift($query->fetchAll());
    }

    public function updateToken($token, $identifier)
    {
        $array = [
            'securitytoken' => $token
        ];
        $where = [
            'identifier' => $identifier
        ];
        return $this->conn->update('securitytokens', $array, $where);
    }
}