<?php

namespace app\models;

use app\core\Model;

class Phonebook extends Model
{
    public function getAllContacts() {
        return $this->getAll("phonebook");
    }

    public function saveContact($params = []) {
        $this->save("phonebook", $params);
    }

}