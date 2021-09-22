<?php

namespace App\Database;

use PDO;


class Database
{
    public $conn;
    public $stmt;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . config('database', 'servername') . ";dbname=" . config('database', 'database'), config('database', 'username'), config('database', 'password'), [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    public function __destruct()
    {
        if (!is_null($this->stmt)) {
            $this->stmt = null;
        }

        if (!is_null($this->conn)) {
            $this->conn = null;
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }

    public function fetchAll()
    {
        $this->stmt->execute();
        $results = $this->stmt->fetchAll();

        return $results;
    }

    public function fetch()
    {
        $this->stmt->execute();
        $result = $this->stmt->fetch();

        return $result;
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
