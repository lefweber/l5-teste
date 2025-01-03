<?php

namespace App\Controllers;

use \App\Controllers\ErrorController;

/**
 * The base Controller for all Controllers
 */
class Controller
{
  /**
   * Name of the view
   */
  private $viewName;

  /**
   * The data to interpolate in the view
   */
  private $data;

  /**
   * The CSS style of the view
   */
  private $css;

  /**
  * Mount, check and print the view
  *
  * @param string $viewName The name of the view to render.
  * @param array|null $data The data to be extracted for the view.
  * @param string|null $css The CSS content for the view.
  *
  * @return void
  */
  protected function view(string $viewName, array $data = [], string $css = ''): void
  {
    $this->viewName = $viewName;
    $this->data = $data;
    $this->css = $css;

    $content = $this->renderView();

    $this->sendResponse($content);
  }

  /**
  * Render the view
  *
  * @return string The rendered content of the view or an error message if the view is not found.
  */
  private function renderView(): string
  {
    extract($this->data);
    $css = $this->css;

    $layout = __DIR__ . '/../Views/Layout.php';
    $viewPath = __DIR__ . '/../Views/' . ucfirst($this->viewName) . '.php';

    if (file_exists($viewPath)) {
        ob_start();
        include $viewPath;
        $viewContent = ob_get_clean();

        ob_start();
        include $layout;

        return ob_get_clean();
    }

    new ErrorController('A view não foi encontrada.', 500);
  }

  /**
  * Prepare the final response
  *
  * @return void
  */
  private function sendResponse(string $content, int $statusCode = 200, $responseType = 'html'): void
  {
    http_response_code($statusCode);
    echo $content;
  }
}
