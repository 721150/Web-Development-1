<?php
namespace App\Models;

class Assessment {
    private $id;
    private $questionOne;
    private $questionTwo;
    private $questionThree;
    private $questionFour;
    private $questionFive;
    private $questionSix;
    private $dateTime
    private $studentId;
    private $courseId;

    public function __construct($_id, $_questionOne, $_questionTwo, $_questionThree, $_questionFour, $_questionFive, $_questionSix, $_dateTime, $_studentId, $_courseId) {
        $this->id = $_id;
        $this->questionOne = $_questionOne;
        $this->questionTwo = $_questionTwo;
        $this->questionThree = $_questionThree;
        $this->questionFour = $_questionFour;
        $this->questionFive = $_questionFive;
        $this->questionSix = $_questionSix;
        $this->dateTime = $_dateTime;
        $this->studentId = $_studentId;
        $this->courseId = $_courseId;
    }

    public function getId() {
        return $this->id;
    }

    public function getQuestionOne() {
        return $this->questionOne;
    }

    public function getQuestionTwo() {
        return $this->questionTwo;
    }

    public function getQuestionThree() {
        return $this->questionThree;
    }

    public function getQuestionFour() {
        return $this->questionFour;
    }

    public function getQuestionFive() {
        return $this->questionFive;
    }

    public function getQuestionSix() {
        return $this->questionSix;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function getStudentId() {
        return $this->studentId;
    }

    public function getCourseId() {
        return $this->courseId;
    }

    public function setQuestionOne($questionOne) {
        $this->questionOne = $questionOne;
    }

    public function setQuestionTwo($questionTwo) {
        $this->questionTwo = $questionTwo;
    }

    public function setQuestionThree($questionThree) {
        $this->questionThree = $questionThree;
    }

    public function setQuestionFour($questionFour) {
        $this->questionFour = $questionFour;
    }

    public function setQuestionFive($questionFive) {
        $this->questionFive = $questionFive;
    }

    public function setQuestionSix($questionSix) {
        $this->questionSix = $questionSix;
    }

    public function setDateTime($dateTime) {
        $this->dateTime = $dateTime;
    }

    public function setStudentId($studentId) {
        $this->studentId = $studentId;
    }

    public function setCourseId($courseId) {
        $this->courseId = $courseId;
    }
}
?>