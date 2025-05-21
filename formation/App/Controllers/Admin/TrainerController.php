<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\BaseController;
use App\Models\Trainer;

class TrainerController extends BaseController
{
    /**
     * @var Trainer
     */
    private Trainer $trainerModel;

    /**
     *
     */
    public function __construct()
    {
        $this->trainerModel = new Trainer();
    }

    /**
     * @return void
     */
    public function index()
    {
        // Récupération des filtres depuis la requête GET
        $filter_id = $_GET['filter_id'] ?? '';
        $filter_name = $_GET['filter_name'] ?? '';
        // Appliquer les filtres dans la méthode du modèle
        $trainers = $this->trainerModel->filterTrainers($filter_id, $filter_name);

        $this->view('admin/trainers/index', [
            'trainers' => $trainers
        ]);
    }

    /**
     * @return void
     */
    public function create()
    {
        $this->view('admin/trainers/create');
    }

    /**
     * @return void
     */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'description' => $_POST['description'],
            ];

            // Chemin d'upload
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/trainers/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0775, true);
            }

            if (!empty($_FILES['photo']['name'])) {
                $filename = uniqid() . '_' . basename($_FILES['photo']['name']);
                $uploadPath = $uploadDir . $filename;

                if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)) {
                    $data['photo'] = '/uploads/trainers/' . $filename; // Chemin web
                } else {
                    die("Erreur lors de l'upload de la photo.");
                }
            } else {
                $data['photo'] = ''; // ou une valeur par défaut
            }

            $this->trainerModel->create($data);
            header("Location: /admin/trainers");
            exit;
        }
    }


    /**
     * @param $id
     * @return void
     */
    public function update($id)
    {
        [$firstName, $lastName] = explode(' ', $_POST['name'] . ' ', 2);

        $data = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'description' => $_POST['description'] ?? '',
        ];

        // Chemin d'upload
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/trainers/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        if (!empty($_FILES['photo']['name'])) {
            $filename = uniqid() . '_' . basename($_FILES['photo']['name']);
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $uploadPath = $uploadDir . $filename;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)) {
                $data['photo'] = '/uploads/trainers/' . $filename;
            } else {
                die("Erreur lors de la mise à jour de la photo.");
            }
        } else {
            $trainer = $this->trainerModel->find($id);
            $data['photo'] = $trainer['photo'] ?? '';
        }

        $this->trainerModel->update($id, $data);
        header("Location: /admin/trainers");
        exit;
    }


    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        $trainerModel = new Trainer();
        $trainerModel->delete($id);

        header("Location: /admin/trainers");
        exit;
    }
}
