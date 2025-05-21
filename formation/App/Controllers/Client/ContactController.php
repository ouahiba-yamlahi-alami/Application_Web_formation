<?php

namespace App\Controllers\Client;

use App\Core\BaseControllerFrontend;

class ContactController extends BaseControllerFrontend
{
    public function index() {
        $this->view('client/contact/index', [
            'title' => 'FormExpert - Contact',
        ]);
    }
}
