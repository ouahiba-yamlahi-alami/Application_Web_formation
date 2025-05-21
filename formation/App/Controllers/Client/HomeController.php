<?php

namespace App\Controllers\Client;

use App\Core\BaseControllerFrontend;
use App\Models\Domaine;

class HomeController extends BaseControllerFrontend
{
    public function index() {
        $domains = Domaine::getAll();
        $this->view('client/home/index', [
            'domains' => $domains
        ]);
    }
}
