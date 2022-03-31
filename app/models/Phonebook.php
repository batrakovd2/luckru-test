<?php

namespace app\models;

use Model;

class Phonebook extends Model
{
    public function getAllContacts() {
        return $this->getAll("phonebook");
    }
}