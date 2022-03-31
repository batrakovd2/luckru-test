<?php

namespace app\core;

use PDO;

class DB
{
    private $db;

    public function __construct()
    {
        $dbinfo = require 'env.php';
        $this->db = new PDO('mysql:host=' . $dbinfo['host'] . ';dbname=' . $dbinfo['dbname'], $dbinfo['login'], $dbinfo['password']);
    }


    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);

        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll($table, $sql = '', $params = [])
    {
        return $this->query("SELECT * FROM $table" . $sql, $params);
    }

    public function getRow($table, $sql = '', $params = [])
    {
        $result = $this->query("SELECT * FROM $table" . $sql, $params);
        return $result[0];
    }

}