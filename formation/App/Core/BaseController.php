<?php
namespace App\Core;

class BaseController
{
    protected function view(string $path, array $data = [], string $layout = 'admin/layout/main')
    {
        extract($data);

        // Démarrer la mise en tampon de sortie pour capturer le contenu de la vue
        ob_start();
        $viewPath = __DIR__ . '/../Views/' . $path . '.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "Vue non trouvée : $viewPath";
        }
        $content = ob_get_clean(); // Le contenu de la vue est maintenant stocké dans $content

        // Inclure le layout (par défaut : admin/layout/main.php)
        $layoutPath = __DIR__ . '/../Views/' . $layout . '.php';
        if (file_exists($layoutPath)) {
            require $layoutPath;
        } else {
            echo "Layout non trouvé : $layoutPath";
        }
    }
}