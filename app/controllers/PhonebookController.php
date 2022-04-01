<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Phonebook;

class PhonebookController extends Controller
{
    public $model;

    public function index() {
        $this->model = new Phonebook();
        $contacts = $this->model->getAllContacts();
        $this->view->render('phonebook.php', $contacts);
    }

    public function create() {
//        print_r($_SERVER);
        $this->model->save();
        return array("status" => "ok");
    }

    public function update() {

    }

    public function destroy() {

    }
}