<?php
namespace App\Controllers;

class AdminDashboardController {
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
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['selected_user'])) {
                $selectedUser = htmlspecialchars($_POST['selected_user']);
                $user = null;
                if ($_POST['type_user'] == "student") {
                    $user = $this->studentService->getById($selectedUser);
                } else if ($_POST['type_user'] == "teacher") {
                    $user = $this->teacherService->getById($selectedUser);
                } else if ($_POST['type_user'] == "admin") {
                    $user = $this->adminService->getById($selectedUser);
                }
                $_SESSION['selectedUser'] = $user;
                header('Location: /EditProfile');
            }
            $allTeachers = $this->teacherService->getAll();
            $_SESSION['allTeachers'] = $allTeachers;
            $allStudents = $this->studentService->getAll();
            $_SESSION['allStudents'] = $allStudents;
            $allAmins = $this->adminService->getAll();
            $allAdmins = $_SESSION['allAdmins'] = $allAmins;
            require __DIR__ . '/../views/dashboard/admindashboard.php';
        }
    }
}
?>