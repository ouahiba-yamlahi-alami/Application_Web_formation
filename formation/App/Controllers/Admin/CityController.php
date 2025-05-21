<?php
declare(strict_types=1);

namespace App\Controllers\Admin;
use App\Core\BaseController;
use App\Models\City;
use App\Models\Country;

class CityController extends BaseController
{
    /**
     * @var City
     */
    private City $cityModel;

    /**
     * @var Country
     */
    private Country $countryModel;

    /**
     * construct method
     */
    public function __construct() {
        $this->cityModel = new City();
        $this->countryModel = new Country();
    }

    /**
     * @return void
     */
    public function index() {
        $filter_id = $_GET['filter_id'] ?? '';
        $filter_name = $_GET['filter_name'] ?? '';
        $cities = $this->cityModel->filter($filter_id, $filter_name);
        $this->view('admin/city/index', ['cities' => $cities]);
    }

    /**
     * @return void
     */
    public function create() {
        $countries = $this->countryModel->all();
        $this->view('admin/city/create', ['countries' => $countries]);
    }

    /**
     * @return void
     */
    public function store() {
        $this->cityModel->create($_POST['name'], $_POST['country_id']);
        header('Location: /admin/city/index');
    }

    /**
     * @param $id
     * @return void
     */
    public function edit($id) {
        $city = $this->cityModel->find($id);
        $this->view('admin/city/edit', ['city' => $city]);
    }

    /**
     * @param $id
     * @return void
     */
    public function update($id) {
        $this->cityModel->update($id, $_POST['name']);
        header('Location: /admin/city/index');
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id) {
        $this->cityModel->delete($id);
        header('Location: /admin/city/index');
    }
}