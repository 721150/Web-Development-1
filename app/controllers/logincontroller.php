<?php
namespace App\Controllers;

class LoginController {
    protected $loginService;

    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->loginService = new \App\Services\LoginService();
    }

    public function login() {  
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $user = $this->loginService->validLogin($email, $password);
            if ($user != null) {
                $_SESSION['name'] = $user->getFullName();
                if ($user instanceof \App\Models\Student) {
                    $_SESSION['student'] = $user;
                    $studentDashboardController = new StudentDasboardController();
                    $studentDashboardController->index();
                }
                elseif ($user instanceof \App\Models\Teacher) {
                    $_SESSION['teacher'] = $user;
                    http_response_code(404);
                }
                elseif ($user instanceof \App\Models\Admin) {
                    $_SESSION['admin'] = $user;
                    http_response_code(404);
                }
                exit;
            }
        }
        require __DIR__ . '/../views/home/login.php';
    }

    public function checkLogin() {
        return isset($_SESSION['name']);
    }
}
?>