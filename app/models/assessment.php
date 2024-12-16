<?php
namespace App\Models;

class Assessment {
    private $id;
    private $answerOne;
    private $answerTwo;
    private $answerThree;
    private $answerFour;
    private $answerFive;
    private $answerSix;
    private $answerSeven;
    private $answerEight;
    private $answerNine;
    private $answerTen;
    private $answerEleven;
    private $answerTwelve;
    private $answerThirteen;
    private $dateTime;
    private $studentId;
    private $courseId;

    public function __construct($_id, $_answerOne, $_answerTwo, $_answerThree, $_answerFour, $_answerFive, $_answerSix, $_answerSeven, $_answerEight, $_answerNine, $_answerTen, $_answerEleven, $_answerTwelve, $_answerThirteen, $_dateTime, $_studentId, $_courseId) {
        $this->id = $_id;
        $this->answerOne = $_answerOne;
        $this->answerTwo = $_answerTwo;
        $this->answerThree = $_answerThree;
        $this->answerFour = $_answerFour;
        $this->answerFive = $_answerFive;
        $this->answerSix = $_answerSix;
        $this->answerSeven = $_answerSeven;
        $this->answerEight = $_answerEight;
        $this->answerNine = $_answerNine;
        $this->answerTen = $_answerTen;
        $this->answerEleven = $_answerEleven;
        $this->answerTwelve = $_answerTwelve;
        $this->answerThirteen = $_answerThirteen;
        $this->dateTime = $_dateTime;
        $this->studentId = $_studentId;
        $this->courseId = $_courseId;
    }

    public function getId() {
        return $this->id;
    }

    public function getAnswerOne() {
        return $this->answerOne;
    }

    public function getAnswerTwo() {
        return $this->answerTwo;
    }

    public function getAnswerThree() {
        return $this->answerThree;
    }

    public function getAnswerFour() {
        return $this->answerFour;
    }

    public function getAnswerFive() {
        return $this->answerFive;
    }

    public function getAnswerSix() {
        return $this->answerSix;
    }

    public function getAnswerSeven() {
        return $this->answerSeven;
    }

    public function getAnswerEight() {
        return $this->answerEight;
    }

    public function getAnswerNine() {
        return $this->answerNine;
    }

    public function getAnswerTen() {
        return $this->answerTen;
    }

    public function getAnswerEleven() {
        return $this->answerEleven;
    }

    public function getAnswerTwelve() {
        return $this->answerTwelve;
    }

    public function getAnswerThirteen() {
        return $this->answerThirteen;
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

    public function setAnswerOne($answerOne) {
        $this->answerOne = $answerOne;
    }

    public function setAnswerTwo($answerTwo) {
        $this->answerTwo = $answerTwo;
    }

    public function setAnswerThree($answerThree) {
        $this->answerThree = $answerThree;
    }

    public function setAnswerFour($answerFour) {
        $this->answerFour = $answerFour;
    }

    public function setAnswerFive($answerFive) {
        $this->answerFive = $answerFive;
    }

    public function setAnswerSix($answerSix) {
        $this->answerSix = $answerSix;
    }

    public function setAnswerSeven($answerSeven) {
        $this->answerSeven = $answerSeven;
    }

    public function setAnswerEight($answerEight) {
        $this->answerEight = $answerEight;
    }

    public function setAnswerNine($answerNine) {
        $this->answerNine = $answerNine;
    }

    public function setAnswerTen($answerTen) {
        $this->answerTen = $answerTen;
    }

    public function setAnswerEleven($answerEleven) {
        $this->answerEleven = $answerEleven;
    }

    public function setAnswerTwelve($answerTwelve) {
        $this->answerTwelve = $answerTwelve;
    }

    public function setAnswerThirteen($answerThirteen) {
        $this->answerThirteen = $answerThirteen;
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