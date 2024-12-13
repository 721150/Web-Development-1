<?php
namespace App\Controllers;

class LoginController {
    private $loginService;

    function __construct() {
        $this->loginService = new \App\Services\LoginService();
    }

    public function index() {
        require_once("../views/home/index.php");
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Controleer inloggegeven en leid verder
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            if ($this->loginService->validLogin($email, $password)) {
                session_start();
                $_SESSION['email'] = $email;
                require("../views/home/index.php");
                exit;
            }
        }
    }
}
?>