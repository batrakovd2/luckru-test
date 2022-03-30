<?php

class PhonebookController extends Controller
{
    public function index() {
        $this->view->render('phonebook.php');
    }
}