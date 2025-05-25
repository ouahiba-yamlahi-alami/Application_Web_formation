<?php

namespace App\Controllers\Client;

use App\Core\BaseControllerFrontend;
use App\Models\Domaine;
use App\Models\Trainer;

class HomeController extends BaseControllerFrontend
{
    public function index() {
        $domains = Domaine::getAll();
        $trainerModel = new Trainer();
        $trainers = $trainerModel->getAll();
        $this->view('client/home/index', [
            'domains' => $domains,
            'trainers' => $trainers
        ]);
    }
}
