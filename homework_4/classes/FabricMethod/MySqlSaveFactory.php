<?php

namespace FabricMethod;

class MySqlSaveFactory implements ISaveFactory
{
    private string $host, $user, $pass, $db;

    public function __construct(string $host, string $user, string $pass, string $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    public function createSaver(): ISave
    {
        return new MySqlSave($this->host, $this->user, $this->pass, $this->db);
    }
}
