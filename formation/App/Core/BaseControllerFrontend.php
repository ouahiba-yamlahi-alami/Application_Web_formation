<?php
namespace App\Core;

class BaseControllerFrontend
{
    protected function view(string $view, array $params = [])
    {
        // Chemin de la vue (ex: home/index)
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            die("View $viewPath not found.");
        }

        // Variables accessibles dans la vue
        extract($params);

        // Capture le contenu de la vue
        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        // Charge le layout principal avec le contenu
        require __DIR__ . '/../Views/layout.php';
    }
}