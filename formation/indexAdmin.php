<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controllers\Admin\CityController;
use App\Controllers\Admin\CountryController;
use App\Controllers\Admin\CourseController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\DomainesController;
use App\Controllers\Admin\FormationController;
use App\Controllers\Admin\SubjectController;
use App\Controllers\Admin\TrainerController;

$url = $_GET['url'] ?? '';
if ($url === '') {
    $url = 'dashboard/index';
}

$parts = explode('/', trim($url, '/'));

$controller = $parts[0] ?? 'dashboard';
$action = $parts[1] ?? 'index';
$id = $parts[2] ?? null;

switch ($controller) {
    case 'dashboard':
        $ctrl = new DashboardController();
        break;
    case 'country':
        $ctrl = new CountryController();
        break;
    case 'city':
        $ctrl = new CityController();
        break;
    case 'domaines':
        $ctrl = new DomainesController();
        break;
    case 'trainers':
        $ctrl = new TrainerController();
        break;
    case 'subjects':
        $ctrl = new SubjectController();
        break;
    case 'courses':
        $ctrl = new CourseController();
        break;
    case 'formations':
        $ctrl = new FormationController();
        break;
    default:
        echo "Contrôleur non trouvé.";
        exit;
}

if (method_exists($ctrl, $action)) {
    $id ? $ctrl->$action($id) : $ctrl->$action();
} else {
    echo "Action non trouvée.";
}