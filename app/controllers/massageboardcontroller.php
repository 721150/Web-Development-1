<?php
namespace App\Controllers;

use App\Models\Course;

class MassageBoardController {
    private $MassageService;
    
    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->MassageService = new \App\Services\MassageService();
    }

    public function index() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            $listOfCources = $this->loadCources();
            $_SESSION['listOfCources'] = $listOfCources;
            require __DIR__ . '/../views/dashboard/massageboard.php';
        }
    }

    private function loadCources() {
        $listOfCources = $this->MassageService->loadCourcesByStudent($_SESSION['student']);
        return $listOfCources;
    }
}
?>