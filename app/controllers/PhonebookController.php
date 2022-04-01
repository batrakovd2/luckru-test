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
        $params = $_POST;
        $this->model = new Phonebook();
        $this->model->saveContact($params);
        return "ok";
    }

    public function update() {

    }

    public function destroy() {

    }
}