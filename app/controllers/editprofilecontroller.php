<?php
namespace App\Controllers;

class EditProfileController {
    private $teacherService;
    private $studentService;
    private $adminService;

    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->teacherService = new \App\Services\TeacherService();
        $this->studentService = new \App\Services\StudentService();
        $this->adminService = new \App\Services\AdminService();
    }

    public function index() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            require __DIR__ . '/../views/profile/editprofile.php';
        }
    }
}
?>