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
   * The JS script of the view
   */
  private $js;

  /**
  * Mount, check and print the view
  *
  * @param string $viewName The name of the view to render.
  * @param array|null $data The data to be extracted for the view.
  * @param string|null $css The CSS content for the view.
  * @param string|null $js The JS script for the view.
  *
  * @return void
  */
  protected function view(string $viewName, array $data = [], string $css = '', string $js = ''): void
  {
    $this->viewName = $viewName;
    $this->data = $data;
    $this->css = $css;
    $this->js = $js;

    extract($this->data);

    if(is_null($code)) {
      $code = 200;
    }

    $content = $this->renderView();

    $this->sendResponse($content, $code);
  }

  /**
   * Call the external Star Wars API
   *
   * @param string $resource Resource to get on API
   *
   * @return array
   */
  protected function callToExternalStarWarsAPI(string $resource): array
  {
    $url = "https://swapi.tech/api/$resource";
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpCode === 200 && $response !== false) {
      $data = json_decode($response, true);

      if(isset($data['message']) && $data['message'] == 'ok') {
          return $data;
      }
      else {
        new ErrorController('Houve um problema na recepção dos dados da API externa.', 500);
      }
    }
    else {
      new ErrorController('Não foi possível se comunicar com a API dos filmes Star Wars, por favor, verifique a sua conexão.', 500);
    }
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
    $js = $this->js;
    $viewName = $this->viewName;

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
