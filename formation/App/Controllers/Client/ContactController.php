<?php

namespace App\Controllers\Client;

use App\Core\BaseControllerFrontend;
use App\Models\Contact;

class ContactController extends BaseControllerFrontend
{
    public function index() {
        $this->view('client/contact/index', [
            'title' => 'FormExpert - Contact',
        ]);
    }

    public function store()
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'] ?? '',
            'subject' => $_POST['subject'],
            'message' => $_POST['message']
        ];

        $model = new Contact();
        $model->create($data);

        header('Location: /client/contact/success');
        exit;
    }

    public function success()
    {
        $this->view('client/contact/success');
    }
}
