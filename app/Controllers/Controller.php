<?php

namespace App\Controllers;

class Controller
{
    protected function view($viewName, $data = [], $css = '')
    {
        extract($data);

        $layout = __DIR__ . '/../Views/Layout.php';
        $viewPath = __DIR__ . '/../Views/' . ucfirst($viewName) . '.php';

        if (file_exists($viewPath)) {
            ob_start();
            include $viewPath;
            $viewContent = ob_get_clean();

            include $layout;
            exit;
        }

        http_response_code(404);
        return "View '{$viewName}' não encontrada.";
    }
}
