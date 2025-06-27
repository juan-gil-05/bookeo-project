<?php

namespace App\Controller;

use Exception;

class Controller
{

    public function route()
    {
        try {
            $urlController = $_GET['controller'] ?? null;
            if (isset($urlController)) {
                switch ($urlController) {
                    case 'home':
                        $pageController = new HomeController();
                        $pageController->test();
                        break;
                    default:
                        throw new Exception("Le controleur n'existe pas");
                        break;
                }
            } else {
                $pageController = new HomeController();
                $pageController->test();
            }
        } catch (Exception $e) {
            $this->render("Errors/error", ["error" => $e->getMessage()]);
        }
    }

    protected function render(string $path, array $params): void
    {
        $filePath = BASE_PATH . "Templates/" . $path . ".php";
        try {

            if (!file_exists($filePath)) {
                throw new Exception("Fichier introuvable: " . $filePath);
            }
            extract($params);
            require_once $filePath;

        } catch (Exception $e) {
            $this->render("Errors/error", ["error" => $e->getMessage()]);
        }
    }
}
