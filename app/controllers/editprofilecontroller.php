<?php
namespace App\Controllers;

class EditProfileController {
    private $teacherService;
    private $studentService;
    private $adminService;
    private $manageprofileserver;

    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->teacherService = new \App\Services\TeacherService();
        $this->studentService = new \App\Services\StudentService();
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
            require __DIR__ . '/../views/profile/editprofile.php';
        }
    }
}
?>