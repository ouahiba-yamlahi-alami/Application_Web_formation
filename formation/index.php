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
    // Utilisation de la classe Database pour obtenir la connexion PDO
    $pdo = Database::getInstance();

    // Vérification de l'existence des tables
    $pdo->query("SELECT 1 FROM countries LIMIT 1");
} catch (PDOException $e) {
    echo "Tables missing. Creating...\n";
    // Si une erreur survient (tables manquantes), on recrée la base de données
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
