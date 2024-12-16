<?php
namespace App\Repositories;

use PDO;
use App\Models\Assessment;

class LoginRepository extends Repository {
    
    function __construct() {
        parent::__construct();
    }

    public function getAll() {
        
    }

    public function insert() {
        $sql = "INSERT INTO `Assessment` (answer_one, answer_two, answer_three, answer_four, answer_five, answer_six, answer_seven, answer_eight, answer_nine, answer_ten, answer_eleven, answer_twelve, answer_thirteen, student_id, course_id) 
        VALUES (:answerOne, :answerTwo, :answerThree, :answerFour, :answerFive, :answerSix, :answerSeven, :answerEight, :answerNine, :answerTen, :answerEleven, :answerTwelve, :answerThirteen, :studentId, :courseId)";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':answerOne', $assessment->getAnswerOne());
        $stmt->bindParam(':answerTwo', $assessment->getAnswerTwo());
        $stmt->bindParam(':answerThree', $assessment->getAnswerThree());
        $stmt->bindParam(':answerFour', $assessment->getAnswerFour());
        $stmt->bindParam(':answerFive', $assessment->getAnswerFive());
        $stmt->bindParam(':answerSix', $assessment->getAnswerSix());
        $stmt->bindParam(':answerSeven', $assessment->getAnswerSeven());
        $stmt->bindParam(':answerEight', $assessment->getAnswerEight());
        $stmt->bindParam(':answerNine', $assessment->getAnswerNine());
        $stmt->bindParam(':answerTen', $assessment->getAnswerTen());
        $stmt->bindParam(':answerEleven', $assessment->getAnswerEleven());
        $stmt->bindParam(':answerTwelve', $assessment->getAnswerTwelve());
        $stmt->bindParam(':answerThirteen', $assessment->getAnswerThirteen());
        $stmt->bindParam(':studentId', $assessment->getStudentId());
        $stmt->bindParam(':courseId', $assessment->getCourseId());

        $stmt->execute();
    }

    public function getById($id) {
        
    }
}
?>