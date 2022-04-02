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

    public function save($table, $params = [])
    {
        $this->query("INSERT INTO $table (`lastname`, `name`, `patronymic`, `phone`, `contact_type`) VALUES (:lastname, :name, :patronymic, :phone, :contact_type)" , $params);
    }

    public function update($table, $params = [])
    {
        $this->query("UPDATE $table SET `lastname`=:lastname, `name`=:name, `patronymic`=:patronymic, `phone`=:phone, `contact_type`=:contact_type WHERE `id` = :id" , $params);
    }

    public function delete($table, $params = [])
    {
        $this->query("DELETE FROM $table WHERE `id` = :id" , $params);
    }

}