<?php
namespace App\Controllers;

use App\Models\Student;

class ManageProfileController {
    private $manageprofileserver;


    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->manageprofileserver = new \App\Services\ManageProfileService();
    }

    public function index() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['password'])) {
                $firstname = htmlspecialchars($_POST['firstName']);
                $lastname = htmlspecialchars($_POST['lastName']);
                $emailAddress = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $image = $_FILES['image'];
                $about = htmlspecialchars($_POST['about']);
    
                $student = $_SESSION['student'];
                $student->setFirstName($firstname);
                $student->setLastName($lastname);
                $student->setEmailAddress($emailAddress);
                $student->setPassword($password);
                $student->setImage($image);
                $student->setAbout($about);
    
                $this->manageprofileserver->updateStudent($student);
    
                $_SESSION['student'] = $student;
                header('Location: /StudentDasboard');
            }
            require __DIR__ . '/../views/profile/manageprofile.php';
        }
    }
}
?>