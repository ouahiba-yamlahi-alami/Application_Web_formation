<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\BaseController;
use App\Models\City;
use App\Models\Country;
use App\Models\Course;
use App\Models\Domaine;
use App\Models\Formation;
use App\Models\Subject;
use App\Models\Trainer;

class DashboardController extends BaseController
{
    public function index()
    {
        $countryCount = (new Country())->count();
        $cityCount = (new City())->count();
        $trainerCount = (new Trainer())->count();
        $subjectCount = (new Subject())->count();
        $formationCount = (new Formation())->count();
        $courseRepository = (new Course())->count();
        $domainRepository = (new Domaine())->count();

        $entityCounts = [
            'Pays' => $countryCount,
            'Villes' => $cityCount,
            'Formateurs' => $trainerCount,
            'Sujets' => $subjectCount,
            'Formations' => $formationCount,
            'cours' => $courseRepository,
            'Domaines' => $domainRepository,

        ];

        $this->view('admin/dashboard/index', [
            'entityCounts' => $entityCounts
        ]);
    }
}
