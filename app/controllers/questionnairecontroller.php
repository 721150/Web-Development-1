<?php
namespace App\Controllers;

use App\Models\Assessment;

class QuestionnaireController {
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
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['overallQuality'])) {
                try {
                    $courseId = htmlspecialchars($_POST['courseId']);
                    $anwserOne = htmlspecialchars($_POST['overallQuality']);
                    $anwserTwo = htmlspecialchars($_POST['teacherSatisfaction']);
                    $anwserThree = htmlspecialchars($_POST['teacherClarity']);
                    $anwserFour = htmlspecialchars($_POST['teacherResponse']);
                    $anwserFive = htmlspecialchars($_POST['teacherAccessibility']);
                    $anwserSix = htmlspecialchars($_POST['teacherMotivation']);
                    $anwserSeven = htmlspecialchars($_POST['lessonRelevance']);
                    $anwserEight = htmlspecialchars($_POST['lessonGoals']);
                    $anwserNine = htmlspecialchars($_POST['lessonChallenge']);
                    $anwserTen = htmlspecialchars($_POST['lessonInteractivity']);
                    $anwserEleven = htmlspecialchars($_POST['teacherEngagement']);
                    $anwserTwelve = htmlspecialchars($_POST['learningMaterials']);
                    $anwserThirteen = htmlspecialchars($_POST['lessonOrganization']);

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
                }
                catch (Exception $e) {
                    //http_response_code(422);
                };
                $studentDashboardController = new StudentDasboardController();
                $studentDashboardController->index();
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