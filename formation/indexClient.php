<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controllers\Client\CalendarController;
use App\Controllers\Client\FormationsController;
use App\Controllers\Client\ContactController;
use App\Controllers\Client\RegistrationController;
use App\Controllers\Client\HomeController;

$url = isset($_GET['url']) ? $_GET['url'] : '';

if ($url === '') {
    $url = 'index.php';
}

$parts = explode('/', trim($url, '/'));

$controller = isset($parts[0]) ? $parts[0] : 'client';
$action = isset($parts[1]) ? $parts[1] : 'index';
$id = isset($parts[2]) ? $parts[2] : null;

switch ($controller) {
    case 'home':
        $ctrl = new HomeController();
        break;
    case 'calendar':
        $ctrl = new CalendarController();
        break;
    case 'formations':
        $ctrl = new FormationsController();
        break;
    case 'contact':
        $ctrl = new ContactController();
        break;
    case 'registration':
        $ctrl = new RegistrationController();
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