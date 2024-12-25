<?php
namespace App\Repositories;

use PDO;
use App\Models\Assessment;
use App\Models\Course;

class QuestionnaireRepository extends Repository {
    
    function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $stmt = $this->connection->prepare("SELECT c.id, c.name, AVG((a.answerOne + a.answerTwo + a.answerThree + a.answerFour + a.answerFive +a.answerSix + a.answerSeven + a.answerEight + a.answerNine + a.answerTen +a.answerEleven + a.answerTwelve + a.answerThirteen) / 13) as average_score, a.time FROM Cource c JOIN Assessment a ON c.id = a.courceId GROUP BY c.id, c.name ORDER BY a.time DESC");
        $stmt->execute();

        $results = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'score' => round($row['average_score'], 2),
                'date' => $row['time']
            ];
        }

        return $results;
    }

    public function insert($assessment) {
        $sql = "INSERT INTO `Assessment` (answerOne, answerTwo, answerThree, answerFour, answerFive, answerSix, answerSeven, answerEight, answerNine, answerTen, answerEleven, answerTwelve, answerThirteen, studentId, courceId) 
        VALUES (:answerOne, :answerTwo, :answerThree, :answerFour, :answerFive, :answerSix, :answerSeven, :answerEight, :answerNine, :answerTen, :answerEleven, :answerTwelve, :answerThirteen, :studentId, :courseId)";

        $stmt = $this->connection->prepare($sql);

        $answerOne = $assessment->getAnswerOne();
        $answerTwo = $assessment->getAnswerTwo();
        $answerThree = $assessment->getAnswerThree();
        $answerFour = $assessment->getAnswerFour();
        $answerFive = $assessment->getAnswerFive();
        $answerSix = $assessment->getAnswerSix();
        $answerSeven = $assessment->getAnswerSeven();
        $answerEight = $assessment->getAnswerEight();
        $answerNine = $assessment->getAnswerNine();
        $answerTen = $assessment->getAnswerTen();
        $answerEleven = $assessment->getAnswerEleven();
        $answerTwelve = $assessment->getAnswerTwelve();
        $answerThirteen = $assessment->getAnswerThirteen();
        $studentId = $assessment->getStudentId();
        $courseId = $assessment->getCourseId();

        $stmt->bindParam(':answerOne', $answerOne);
        $stmt->bindParam(':answerTwo', $answerTwo);
        $stmt->bindParam(':answerThree', $answerThree);
        $stmt->bindParam(':answerFour', $answerFour);
        $stmt->bindParam(':answerFive', $answerFive);
        $stmt->bindParam(':answerSix', $answerSix);
        $stmt->bindParam(':answerSeven', $answerSeven);
        $stmt->bindParam(':answerEight', $answerEight);
        $stmt->bindParam(':answerNine', $answerNine);
        $stmt->bindParam(':answerTen', $answerTen);
        $stmt->bindParam(':answerEleven', $answerEleven);
        $stmt->bindParam(':answerTwelve', $answerTwelve);
        $stmt->bindParam(':answerThirteen', $answerThirteen);
        $stmt->bindParam(':studentId', $studentId);
        $stmt->bindParam(':courseId', $courseId);

        $stmt->execute();
    }

    public function getById($id) {
        $stmt = $this->connection->prepare("SELECT c.id, c.name, AVG(a.answerOne) as avg_answer_one, AVG(a.answerTwo) as avg_answer_two, AVG(a.answerThree) as avg_answer_three, AVG(a.answerFour) as avg_answer_four, AVG(a.answerFive) as avg_answer_five, AVG(a.answerSix) as avg_answer_six, AVG(a.answerSeven) as avg_answer_seven, AVG(a.answerEight) as avg_answer_eight, AVG(a.answerNine) as avg_answer_nine, AVG(a.answerTen) as avg_answer_ten, AVG(a.answerEleven) as avg_answer_eleven, AVG(a.answerTwelve) as avg_answer_twelve, AVG(a.answerThirteen) as avg_answer_thirteen, a.time FROM Cource c JOIN Assessment a ON c.id = a.courceId WHERE c.id = :id GROUP BY c.id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        $results = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $results[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'avg_answer_one' => round($row['avg_answer_one'], 2),
                'avg_answer_two' => round($row['avg_answer_two'], 2),
                'avg_answer_three' => round($row['avg_answer_three'], 2),
                'avg_answer_four' => round($row['avg_answer_four'], 2),
                'avg_answer_five' => round($row['avg_answer_five'], 2),
                'avg_answer_six' => round($row['avg_answer_six'], 2),
                'avg_answer_seven' => round($row['avg_answer_seven'], 2),
                'avg_answer_eight' => round($row['avg_answer_eight'], 2),
                'avg_answer_nine' => round($row['avg_answer_nine'], 2),
                'avg_answer_ten' => round($row['avg_answer_ten'], 2),
                'avg_answer_eleven' => round($row['avg_answer_eleven'], 2),
                'avg_answer_twelve' => round($row['avg_answer_twelve'], 2),
                'avg_answer_thirteen' => round($row['avg_answer_thirteen'], 2),
                'date' => $row['time']
            ];
        }
    
        return $results;
    }

    public function loadOpenQusetionnaireByStudent($student) {
        $listOfQuestionnaire = [];
        try {
            $stmt = $this->connection->prepare("SELECT Cource.id, Cource.name, Cource.discipline FROM `StudentCource` JOIN `Cource` ON Cource.id = StudentCource.courceId LEFT JOIN `Assessment` ON StudentCource.studentId = Assessment.studentId AND StudentCource.courceId = Assessment.courceId WHERE StudentCource.studentId = :studentId AND Assessment.id IS NULL");
            $stmt->execute([':studentId' => $student->getStudentId()]);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $questionnaire = new Course($row['id'], $row['name'], $row['discipline']);
                $listOfQuestionnaire[] = $questionnaire;
            }
        } catch (Exception $e) {}

        return $listOfQuestionnaire;
    }
}
?>