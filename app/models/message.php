<?php
namespace App\Models;

class Message {
    private $id;
    private $description;
    private $content;
    private $dateTime;
    private $studentId;
    private $courceId;

    public function __construct($_id, $_description, $_content, $_dateTime, $_studentId, $_courseId) {
        $this->id = $_id;
        $this->description = $_description;
        $this->content = $_content;
        $this->dateTime = $_dateTime;
        $this->studentId = $_studentId;
        $this->courseId = $_courseId;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getContent() {
        return $this->content;
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

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setContent($content) {
        $this->content = $content;
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