<?php

namespace App\Controllers\Client;

use App\Core\BaseControllerFrontend;
use App\Models\Formation;
use App\Models\FormationDate;

class CalendarController extends BaseControllerFrontend
{
    public function index()
    {
        $formationModel = new Formation();
        $formations = $formationModel->getAll();

        $formationDateModel = new FormationDate();

        foreach ($formations as &$formation) {
            $dates = $formationDateModel->getByFormationId($formation['id']);
            $formation['dates'] = array_column($dates, 'date');
        }

        $this->view('client/calendar/index', [
            'title' => 'FormExpert - Calendar',
            'formations' => $formations
        ]);
    }
}
