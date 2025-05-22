<?php

declare(strict_types=1);
namespace App\Controllers\Admin;

use App\Core\BaseController;
use App\Models\Formation;
use App\Models\FormationDate;
use App\Models\Course;
use App\Models\City;
use App\Models\Trainer;

class FormationController extends BaseController
{
    /**
     * @var Formation
     */
    private Formation $formationModel;

    /**
     * @var FormationDate
     */
    private FormationDate $formationDateModel;

    /**
     * @var Course
     */
    private Course $courseModel;

    /**
     * @var City
     */
    private City $cityModel;

    /**
     * @var Trainer
     */
    private Trainer $trainerModel;

    /**
     *
     */
    public function __construct()
    {
        $this->formationModel = new Formation();
        $this->formationDateModel = new FormationDate();
        $this->courseModel = new Course();
        $this->cityModel = new City();
        $this->trainerModel = new Trainer();
    }

    public function index()
    {
        $filters = [
            'price' => $_GET['filter_price'] ?? null,
            'mode' => $_GET['filter_mode'] ?? null,
            'course_id' => $_GET['filter_course_id'] ?? null,
            'city_id' => $_GET['filter_city_id'] ?? null,
            'trainer_id' => $_GET['filter_trainer_id'] ?? null,
        ];

        $formations = $this->formationModel->filter($filters);

        $courses = $this->courseModel->all();
        $cities = $this->cityModel->all();
        $trainers = $this->trainerModel->getAll();

        $this->view('admin/formations/index', [
            'formations' => $formations,
            'courses' => $courses,
            'cities' => $cities,
            'trainers' => $trainers,
            'filters' => $filters // utile pour garder les valeurs des filtres dans le formulaire
        ]);
    }

    /**
     * @return void
     */
    public function create()
    {
        $courses = $this->courseModel->all();
        $cities = $this->cityModel->all();
        $trainers = $this->trainerModel->getAll();
        $this->view('admin/formations/create', [
            'courses' => $courses,
            'cities' => $cities,
            'trainers' => $trainers
        ]);
    }

    /**
     * @return void
     */
    public function store()
    {
        $data = [
            'price' => $_POST['price'],
            'mode' => $_POST['mode'],
            'course_id' => $_POST['course_id'],
            'city_id' => $_POST['city_id'],
            'trainer_id' => $_POST['trainer_id'],
        ];
        $formation_id = $this->formationModel->create($data);

        if (!empty($_POST['dates'])) {
            foreach ($_POST['dates'] as $date) {
                $this->formationDateModel->create([
                    'date' => $date,
                    'formation_id' => $formation_id
                ]);
            }
        }

        header('Location: /admin/formations');
        exit;
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        $this->formationDateModel->deleteByFormationId($id);
        $this->formationModel->delete($id);
        header('Location: /admin/formations');
    }
}
