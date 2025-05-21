<?php

declare(strict_types=1);
namespace App\Controllers\Admin;

use App\Core\BaseController;
use App\Models\Domaine;
use App\Models\Subject;

class SubjectController extends BaseController
{
    /**
     * @var Subject
     */
    private Subject $model;

    /**
     * @var Domaine
     */
    private Domaine $domaineModel;

    /**
     *
     */
    public function __construct()
    {
        $this->model = new Subject();
        $this->domaineModel = new Domaine();
    }

    /**
     * @return void
     */
    public function index()
    {
        // Récupération des filtres depuis la requête GET
        $filter_id = isset($_GET['filter_id']) ? $_GET['filter_id'] : '';
        $filter_name = isset($_GET['filter_name']) ? $_GET['filter_name'] : '';
        // Appliquer les filtres dans la méthode du modèle
        $subjects = $this->model->filterSubject($filter_id, $filter_name);

        // Passer les résultats à la vue
        $this->view('admin/subjects/index', ['subjects' => $subjects]);
    }

    /**
     * @return void
     */
    public function create()
    {
        $domaines = $this->domaineModel->all();

        $this->view('admin/subjects/create',['domaines' => $domaines]);
    }

    /**
     * @return void
     */
    public function store()
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'shortDescription' => $_POST['shortDescription'] ?? '',
            'longDescription' => $_POST['longDescription'] ?? '',
            'individualBenefit' => $_POST['individualBenefit'] ?? '',
            'businessBenefit' => $_POST['businessBenefit'] ?? '',
            'logo' => '', // sera défini après upload
            'domain_id' => $_POST['domain_id'] ?? null
        ];

        // Gérer l’upload du logo
        if (!empty($_FILES['logo']['name'])) {
            $filename = uniqid() . '_' . $_FILES['logo']['name'];
            $destination = __DIR__ . '/../../../uploads/subjects/' . $filename;

            if (move_uploaded_file($_FILES['logo']['tmp_name'], $destination)) {
                $data['logo'] = '/uploads/subjects/' . $filename;
            } else {
                die('Erreur lors de l\'upload du logo.');
            }
        }

        $subjectModel = new Subject();
        $subjectModel->create($data);

        header('Location: /admin/subjects');
        exit;
    }

    /**
     * @param $id
     * @return void
     */
    public function edit($id) {
        $subject = $this->model->find($id);
        $domains = $this->domaineModel->all(); // ou Domain::all()
        $this->view('admin/subjects/edit', ['subject' => $subject, 'domains' => $domains]);
    }

    /**
     * @param $id
     * @return void
     */
    public function update($id)
    {
        // Récupération des données du formulaire
        $data = [
            'name' => $_POST['name'] ?? '',
            'shortDescription' => $_POST['shortDescription'] ?? '',
            'longDescription' => $_POST['longDescription'] ?? '',
            'individualBenefit' => $_POST['individualBenefit'] ?? '',
            'businessBenefit' => $_POST['businessBenefit'] ?? '',
            'domain_id' => $_POST['domain_id'] ?? null,
        ];

        // Gestion du logo si un nouveau fichier est uploadé
        $uploadDir = realpath(__DIR__ . '/../../../uploads/subjects');

        if ($uploadDir === false) {
            $uploadDir = __DIR__ . '/../../../uploads/subjects';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
        }

        if (!empty($_FILES['logo']['name'])) {
            $filename = uniqid() . '_' . basename($_FILES['logo']['name']);
            $destination = $uploadDir . '/' . $filename;

            if (move_uploaded_file($_FILES['logo']['tmp_name'], $destination)) {
                $data['logo'] = '/uploads/subjects/' . $filename;
            } else {
                die('Erreur lors de l\'upload du logo.');
            }
        }


        // Mise à jour via le modèle
        $this->model->update($id, $data);

        // Redirection
        header('Location: /admin/subjects');
        exit;
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: /admin/subjects/index');
    }
}