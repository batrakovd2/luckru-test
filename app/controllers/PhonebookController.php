<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Phonebook;

class PhonebookController extends Controller
{
    public function index() {
        $model = new Phonebook();
//        $contacts = $model->getAllContacts();
//        print_r($contacts);
        $this->view->render('phonebook.php');
    }

    public function create() {

    }

    public function update() {

    }

    public function destroy() {

    }
}