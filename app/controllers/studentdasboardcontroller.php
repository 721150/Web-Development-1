<?php
namespace App\Controllers;

use App\Models\Course;

class StudentDasboardController {
    private $openQuestionnaireService;

    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->openQuestionnaireService = new \App\Services\OpenQuestionnaireService();
    }

    public function index() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            $listOfQuestionnaire = $this->loadQuestionnaire();
            $_SESSION['listOfQuestionnaire'] = $listOfQuestionnaire;
            require __DIR__ . '/../views/dashboard/studentdasboard.php';
        }
    }

    public function endSession() {
        $endingSession = new EndingSession();
        $endingSession->end_session();
        exit;
    }

    public function openQuestionnaire() {
        $course = new Course($_POST['id'], $_POST['name'], $_POST['discipline']);
        $questionnaireController = new QuestionnaireController();
        $questionnaireController->index($course);
    }

    private function loadQuestionnaire() {
        $listOfQuestionnaire = $this->openQuestionnaireService->loadOpenQusetionnaireByStudent($_SESSION['student']);
        return $listOfQuestionnaire;
    }
}
?>