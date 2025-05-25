<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Database;
use App\Controllers\Client\HomeController;

$page = $_GET['page'] ?? 'home';

function initializeDatabase($pdo) {
    $sql = file_get_contents('includes/tables.sql');
    $pdo->exec($sql);
}

try {
    $pdo = Database::getInstance();
    $pdo->query("SELECT 1 FROM countries LIMIT 1");
    $pdo->query("SELECT 1 FROM contacts LIMIT 1");
} catch (PDOException $e) {
    $pdo = Database::getInstance();
    initializeDatabase($pdo);
}

switch ($page) {
    case 'home':
        (new HomeController())->index();
        break;
    default:
        http_response_code(404);
        echo "404 - Page not found";
        break;
}
