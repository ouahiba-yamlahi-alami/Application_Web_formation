<?php

namespace App\Controllers\Client;

use App\Core\BaseControllerFrontend;

class CalendarController extends BaseControllerFrontend
{
    public function index() {
        $this->view('client/calendar/index', [
            'title' => 'FormExpert - Calendar',
        ]);
    }
}
