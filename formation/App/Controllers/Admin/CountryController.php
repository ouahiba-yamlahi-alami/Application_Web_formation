<?php
declare(strict_types=1);
namespace App\Controllers\Admin;

use App\Core\BaseController;
use App\Models\Country;

class CountryController extends BaseController
{
    /**
     * @var Country
     */
    private Country $model;

    public function __construct() {
        $this->model = new Country();
    }

    /**
     * @return void
     */
    public function index() {
        // Récupération des filtres depuis la requête GET
        $filter_id = isset($_GET['filter_id']) ? $_GET['filter_id'] : '';
        $filter_name = isset($_GET['filter_name']) ? $_GET['filter_name'] : '';
        // Appliquer les filtres dans la méthode du modèle
        $countries = $this->model->filterCountries($filter_id, $filter_name);

        // Passer les résultats à la vue
        $this->view('admin/country/index', ['countries' => $countries]);
    }

    /**
     * @return void
     */
    public function create() {
        $this->view('admin/country/create');
    }

    /**
     * @return void
     */
    public function store() {
        $this->model->create($_POST['name']);
        header('Location: /admin/country/index');
    }

    /**
     * @param $id
     * @return void
     */
    public function edit($id) {
        $country = $this->model->find($id);
        $this->view('admin/country/edit', ['country' => $country]);
    }

    /**
     * @param $id
     * @return void
     */
    public function update($id) {
        $this->model->update($id, $_POST['name']);
        header('Location: /admin/country/index');
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id) {
        $this->model->delete($id);
        header('Location: /admin/country/index');
    }
}
