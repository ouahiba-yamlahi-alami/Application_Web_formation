<?php

namespace App\Controllers\Client;

use App\Core\BaseControllerFrontend;
use App\Models\Registration;
use App\Models\Formation;
class RegistrationController extends BaseControllerFrontend
{
    public function index($formationId)
    {
        $formationModel = new Formation();
        $formation = $formationModel->find($formationId);
        $this->view('client/registration/index', [
            'formationId' => $formationId,
            'formation' => $formation
        ]);
    }

    public function store()
    {
        $data = [
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'company' => $_POST['company'],
            'paid' => isset($_POST['paid']) ? (int)$_POST['paid'] : 0,
            'formation_id' => $_POST['formation_id']
        ];

        $model = new Registration();
        $model->create($data);

        header('Location: /client/registration/success');
        exit;
    }

    public function success()
    {
        $this->view('client/registration/success');
    }
}
