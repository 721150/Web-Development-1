<?php
namespace App\Controllers;

class CourseInformationController {
    private $teacherService;
    private $courseService;
    
    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->teacherService = new \App\Services\TeacherService();
        $this->courseService = new \App\Services\CourseService();
    }

    public function index() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            $allTeachers = $this->teacherService->getAll();
            $allCourses = $this->courseService->getAll();
            $_SESSION['allTeachers'] = $allTeachers;
            $_SESSION['allCourses'] = $allCourses;
            require __DIR__ . '/../views/dashboard/courseinformation.php';
        }
    }
}
?>