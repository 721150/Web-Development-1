<?php
namespace App\Controllers;

use App\Models\Assessment;

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
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                try {
                    $cource = htmlspecialchars($_POST['cource']);
                    $anserOne = htmlspecialchars($_POST['overallQuality']);
                    $anserTwo = htmlspecialchars($_POST['teacherSatisfaction']);
                    $anserThree = htmlspecialchars($_POST['teacherClarity']);
                    $anserFour = htmlspecialchars($_POST['teacherResponse']);
                    $anserFive = htmlspecialchars($_POST['teacherAccessibility']);
                    $anserSix = htmlspecialchars($_POST['teacherMotivation']);
                    $anserSeven = htmlspecialchars($_POST['lessonRelevance']);
                    $anserEight = htmlspecialchars($_POST['lessonGoals']);
                    $anserNine = htmlspecialchars($_POST['lessonChallenge']);
                    $anserTen = htmlspecialchars($_POST['lessonInteractivity']);
                    $anserEleven = htmlspecialchars($_POST['teacherEngagement']);
                    $anserTwelve = htmlspecialchars($_POST['learningMaterials']);
                    $anserThirteen = htmlspecialchars($_POST['lessonOrganization']);

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
                        $cource->getId()
                    );
                }
                catch (Exception $e) {};
            }

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