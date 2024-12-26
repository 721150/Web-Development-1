<?php
namespace App\Controllers;

use App\Models\User;

class RegisterProfileController {
    private $registerserver;

    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->registerserver = new \App\Services\RegisterService();
    }

    public function index() {  
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['password'])) {
            $firstname = htmlspecialchars($_POST['firstName']);
            $lastname = htmlspecialchars($_POST['lastName']);
            $emailAddress = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $image = $_FILES['image'];
            $accountType = htmlspecialchars($_POST['accountType']);

            $user = new User(null, $firstname, $lastname, $emailAddress, $password, null);
            
            if (isset($image)) {
                $user->setImage($image);
            }

            if ($accountType == "student") {
                $this->registerserver->addStudent($user);
            } else if ($accountType == "docent") {
                $this->registerserver->addTeacher($user);
            } else if ($accountType == "beheerder") {
                $this->registerserver->addAdmin($user);
            }
            header('Location: /');
        }
        require __DIR__ . '/../views/profile/registerprofile.php';
    }
}
?>