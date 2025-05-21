<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\BaseController;
use App\Models\City;
use App\Models\Country;
use App\Models\Formation;
use App\Models\Subject;
use App\Models\Trainer;

class DashboardController extends BaseController
{
    /**
     * @return void
     */
    public function index()
    {
        $countryCount = (new Country())->count(); // ajoute une méthode count() dans le modèle
        $cityCount = (new City())->count();
        $trainerCount = (new Trainer())->count();
        //$disciplineCount = (new Discipline())->count();
        $subjectCount = (new Subject())->count();
        $formationCount = (new Formation())->count();

        $entityCounts = [
            'Countries' => $countryCount,
            'Cities' => $cityCount,
            'Formateurs' => $trainerCount,
            //'Disciplines' => $disciplineCount,
            'Sujets' => $subjectCount,
            'Formations' => $formationCount
        ];

        $this->view('admin/dashboard/index', [
            'entityCounts' => $entityCounts
        ]);
    }
}