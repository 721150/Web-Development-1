<?php
namespace App\Controllers;

use App\Models\Assessment;

class ResultQuestionnaireController {
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
            $id = $_SESSION['resultCource'];
            $courceResult = $this->QuestionnaireService->getById($id);
            $_SESSION['resultCource'] = $courceResult; 
            require __DIR__ . '/../views/forms/resultquestionnaire.php';
        }
    }
}
?>