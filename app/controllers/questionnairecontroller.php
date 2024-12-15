<?php
namespace App\Controllers;

class QuestionnaireController {
    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index($course, $teacher) {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            require __DIR__ . '/../views/forms/questionnaire.php';
        }
    }

    public function endSession() {
        $endingSession = new EndingSession();
        $endingSession->end_session();
        exit;
    }
}
?>