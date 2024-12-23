<?php
namespace App\Controllers;

use App\Models\Assessment;

class QuestionnaireController {
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
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['courseId'])) {
                try {
                    $courseId = htmlspecialchars($_POST['courseId']);
                    $answerOne = htmlspecialchars($_POST['overallQuality']);
                    $answerTwo = htmlspecialchars($_POST['teacherSatisfaction']);
                    $answerThree = htmlspecialchars($_POST['teacherClarity']);
                    $answerFour = htmlspecialchars($_POST['teacherResponse']);
                    $answerFive = htmlspecialchars($_POST['teacherAccessibility']);
                    $answerSix = htmlspecialchars($_POST['teacherMotivation']);
                    $answerSeven = htmlspecialchars($_POST['lessonRelevance']);
                    $answerEight = htmlspecialchars($_POST['lessonGoals']);
                    $answerNine = htmlspecialchars($_POST['lessonChallenge']);
                    $answerTen = htmlspecialchars($_POST['lessonInteractivity']);
                    $answerEleven = htmlspecialchars($_POST['teacherEngagement']);
                    $answerTwelve = htmlspecialchars($_POST['learningMaterials']);
                    $answerThirteen = htmlspecialchars($_POST['lessonOrganization']);

                    $assessment = new Assessment(
                        null,
                        $answerOne,
                        $answerTwo,
                        $answerThree,
                        $answerFour,
                        $answerFive,
                        $answerSix,
                        $answerSeven,
                        $answerEight,
                        $answerNine,
                        $answerTen,
                        $answerEleven,
                        $answerTwelve,
                        $answerThirteen,
                        null,
                        $_SESSION['student']->getStudentId(),
                        $courseId
                    );
                    $this->QuestionnaireService->insert($assessment);
                }
                catch (Exception $e) {
                    http_response_code(422);
                };
                header('Location: /StudentDasboard');
            }
            $selectedCourse = $_SESSION['course'];
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