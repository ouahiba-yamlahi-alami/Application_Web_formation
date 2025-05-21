<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Domaine;
use App\Core\BaseController;
class DomainesController extends BaseController
{

    /**
     * @var Domaine
     */
    private Domaine $model;

    public function __construct() {
        $this->model = new Domaine();
    }

    /**
     * @return void
     */
    public function index() {
        // Récupération des filtres depuis la requête GET
        $filter_id = isset($_GET['filter_id']) ? $_GET['filter_id'] : '';
        $filter_name = isset($_GET['filter_name']) ? $_GET['filter_name'] : '';
        // Appliquer les filtres dans la méthode du modèle
        $domaines = $this->model->filterDomaines($filter_id, $filter_name);

        // Passer les résultats à la vue
        $this->view('admin/domaines/index', ['domaines' => $domaines]);
    }

    /**
     * @return void
     */
    public function create() {
        $this->view('admin/domaines/create');
    }

    /**
     * @return void
     */
    public function store() {
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';

        $this->model->create($name, $description);
        header('Location: /admin/domaines/index');
    }

    /**
     * @param $id
     * @return void
     */
    public function edit($id) {
        $domaines = $this->model->find($id);
        $this->view('admin/domaines/edit', ['domaines' => $domaines]);
    }

    /**
     * @param $id
     * @return void
     */
    public function update($id) {
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';

        $this->model->update($id, $name, $description);
        header('Location: /admin/domaines/index');
    }


    /**
     * @param $id
     * @return void
     */
    public function delete($id) {
        $this->model->delete($id);
        header('Location: /admin/domaines/index');
    }
}