<?php
namespace App\Controllers;

use App\Models\Course;

class TeacherDashboardController {
    private $courseService;
    private $studentService;

    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->courseService = new \App\Services\CourseService();
        $this->studentService = new \App\Services\StudentService();
    }

    public function index() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['new_cource'])) {
                    $courseName = htmlspecialchars($_POST['courseName']);
                    $courseDescription = htmlspecialchars($_POST['courseDescription']);
                    $this->courseService->createCourse($courseName, $courseDescription);
                } elseif (isset($_POST['add_student'])) {
                    $courseId = htmlspecialchars($_POST['course_id']);
                    $studentIds = $_POST['student_ids'];
                    foreach ($studentIds as $studentId) {
                        $this->courseService->addStudentToCourse($courseId, htmlspecialchars($studentId));
                    }
                }
                header('Location: /');
            }
            $allCourses = $this->courseService->getAll();
            $_SESSION['allCourses'] = $allCourses;
            $allStudents = $this->studentService->getAll();
            $_SESSION['allStudents'] = $allStudents;
            require __DIR__ . '/../views/dashboard/teacherdashboard.php';
        }
    }
}
?>