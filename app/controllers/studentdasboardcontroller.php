<?php
namespace App\Controllers;

class StudentDasboardController {
    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            require __DIR__ . '/../views/dashboard/studentdasboard.php';
        }
    }

    public function endSession() {
        $endingSession = new EndingSession();
        $endingSession->end_session();
        exit;
    }

    public function openQuestionnaire() {
        $course = $_POST['course'];
        $teacher = $_POST['teacher'];
        $questionnaireController = new QuestionnaireController();
        $questionnaireController->index($course, $teacher);
    }
}
?>