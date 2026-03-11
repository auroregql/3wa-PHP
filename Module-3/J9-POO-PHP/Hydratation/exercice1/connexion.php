<?php

class Database
{
    private $host = "localhost";
    private $dbname = "auroregicquelcolleu_pooj1";
    private $username = "auroregicquelcolleu";
    private $password = "514b3eda307289da5b9ccb0a4735bcd4";
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO(
            "mysql:host=$this->host;dbname=$this->dbname;charset=utf8",
            $this->username,
            $this->password
        );
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}

?>