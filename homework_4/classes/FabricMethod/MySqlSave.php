<?php

namespace FabricMethod;

class MySqlSave implements ISave
{
    private $mysqli;

    public function __construct($host, $user, $pass, $db)
    {
        $this->mysqli = new \mysqli($host, $user, $pass, $db);
        if ($this->mysqli->connect_error) {
            die('Ошибка подключения(' . $this->mysqli->connect_errno . ') '
                . $this->mysqli->connect_error);
        }
    }

    public function save(string $message)
    {
        $result = $this->mysqli->query("INSERT INTO `messages`(`text`) VALUES ('" . $message . "')");
    }
}
