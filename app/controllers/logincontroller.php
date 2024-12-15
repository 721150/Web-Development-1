<?php
namespace App\Controllers;

class LoginController {
    protected $loginService;

    function __construct() {
        $this->loginService = new \App\Services\LoginService();
    }

    protected function login() {   
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            if ($this->loginService->validLogin($email, $password)) {
                $_SESSION['email'] = $email;
                require __DIR__ . '/../views/dashboard/studentdasboard.php';
                exit;
            }
        }
        require __DIR__ . '/../views/home/login.php';
    }

    protected function checkLogin() {
        return isset($_SESSION['email']);
    }
}
?>