<?php
namespace App\Controllers;

use App\Models\Course;

class ResultBoardController {
    private $MassageService;
    private $QuestionnaireService;
    
    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->MassageService = new \App\Services\MassageService();
        $this->QuestionnaireService = new \App\Services\QuestionnaireService();
    }

    public function index() {
        $loginController = new LoginController();
        if (!$loginController->checkLogin()) {
            $loginController->login();
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['selected_questionnaire'])) {
                $selectedQuestionnaire = $_POST['selected_questionnaire'];
                $_SESSION['resultCource'] = $selectedQuestionnaire;
                header('Location: /ResultQuestionnaire');
            }
            $messages = $this->MassageService->getAll();
            $_SESSION['messages'] = $messages;
            $results = $this->QuestionnaireService->getAll();
            $_SESSION['results'] = $results;
            require __DIR__ . '/../views/dashboard/resultboard.php';
        }
    }
}
?>