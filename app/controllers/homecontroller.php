<?php
namespace App\Controllers;

class HomeController {
    private $studentService;

    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->studentService = new \App\Services\StudentService();
    }

    public function index() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            if (isset($_SESSION['student'])) {
                require __DIR__ . '/../views/dashboard/studentdasboard.php';
            }
            else if (isset($_SESSION['teacher'])) {
                http_response_code(404);
            }
            else if (isset($_SESSION['admin'])) {
                http_response_code(404);
            }
            exit;
        }
    }
}
?>