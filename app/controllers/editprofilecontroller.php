<?php
namespace App\Controllers;

use \App\Models\Teacher;
use \App\Models\Student;
use \App\Models\Admin;

class EditProfileController {
    private $teacherService;
    private $adminService;
    private $manageprofileserver;

    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->teacherService = new \App\Services\TeacherService();
        $this->adminService = new \App\Services\AdminService();
        $this->manageprofileserver = new \App\Services\ManageProfileService();
    }

    public function index() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteUserId'])) {
                $this->manageprofileserver->deleteProfileById($_POST['deleteUserId']);
                header('Location: /');
                exit;
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editUserId'])) {
                $firstname = htmlspecialchars($_POST['firstName']);
                $lastname = htmlspecialchars($_POST['lastName']);
                $emailAddress = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $image = $_FILES['image'];
                $id = htmlspecialchars($_POST['editUserId']);
                if ($_POST['type_user'] == "teacher") {
                    $teacher = new Teacher($id, $firstname, $lastname, $emailAddress, $password, null, null);
                    $teacher->setImage($image);
                    $this->teacherService->updateTeacher($teacher);
                } else if ($_POST['type_user'] == "student") {
                    $about = htmlspecialchars($_POST['about']);
                    $student = new Student($id, $firstname, $lastname, $emailAddress, $password, null, null, $about);
                    $student->setImage($image);
                    $this->manageprofileserver->updateStudent($student);
                } else if ($_POST['type_user'] == "admin") {
                    $admin = new Admin($id, $firstname, $lastname, $emailAddress, $password, null, null);
                    $admin->setImage($image);
                    $this->adminService->updateAdmin($admin);
                }
                header('Location: /');
                exit;
            }
            require __DIR__ . '/../views/profile/editprofile.php';
        }
    }
}
?>