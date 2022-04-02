<?php

namespace app\models;

use app\core\Model;

class Phonebook extends Model
{
    public function getAllContacts() {
        return $this->getAll("phonebook");
    }

    public function saveContact($params = []) {
        try {
            $this->save("phonebook", $params);
            echo 200;
        } catch (\Exception $e) {
            echo 500;
        }
    }

    public function updateContact($params = []) {
        try {
            $this->update("phonebook", $params);
            echo 200;
        } catch (\Exception $e) {
            echo 500;
        }
    }

    public function deleteContact($params = []) {
        try {
            $this->delete("phonebook", $params);
            echo 200;
        } catch (\Exception $e) {
            echo 500;
        }
    }

}