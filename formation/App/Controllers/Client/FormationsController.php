<?php

namespace App\Controllers\Client;

use App\Core\BaseControllerFrontend;
use App\Models\City;
use App\Models\Formation;
use App\Models\Domaine;
use App\Models\Subject;
use App\Models\Course;

class FormationsController extends BaseControllerFrontend
{
    public function index() {
        $formationModel = new Formation();
        $formations = $formationModel->getAll();
        $domains = $this->getDomains();
        $subjects = $this->getSubjects();
        $courses = $this->getCourses();
        $cities = $this->getCities();

        $this->view('client/formations/index', [
            'title' => 'FormExpert - Formations',
            'formations' => $formations,
            'domains' => $domains,
            'subjects' => $subjects,
            'courses' => $courses,
            'cities' => $cities,
        ]);
    }

    private function getDomains() {
        $domainModel = new Domaine();
        return $domainModel->getAll();
    }
    private function getSubjects() {
        $subjectModel = new Subject();
        return $subjectModel->all();
    }
    private function getCourses() {
        $courseModel = new Course();
        return $courseModel->all();
    }
    private function getCities() {
        $cityModel = new City();
        return $cityModel->all();
    }
}
