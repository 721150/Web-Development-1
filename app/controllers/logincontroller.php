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
            $user = $this->loginService->validLogin($email, $password);
            if ($user != null) {
                $_SESSION['name'] = $user->getFirstName() . " " . $user->getLastName();
                if ($user instanceof \App\Models\Student) {
                    require __DIR__ . '/../views/dashboard/studentdasboard.php';
                }
                elseif($user instanceof \App\Models\Teacher) {
                    http_response_code(404);
                }
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