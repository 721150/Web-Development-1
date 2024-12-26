<?php
namespace App\Controllers;

use App\Models\Course;

class StudentDasboardController {
    private $QuestionnaireService;

    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->QuestionnaireService = new \App\Services\QuestionnaireService();
    }

    public function index() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            $listOfQuestionnaire = $this->QuestionnaireService->loadOpenQusetionnaireByStudent($_SESSION['student']);
            $_SESSION['listOfQuestionnaire'] = $listOfQuestionnaire;
            require __DIR__ . '/../views/dashboard/studentdasboard.php';
        }
    }

    public function openQuestionnaire() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            $course = new Course($_POST['id'], $_POST['name'], $_POST['discipline']);
            $_SESSION['course'] = $course;
            header('Location: /Questionnaire');
        }
    }
}
?>