<?php
namespace App\Models

class StudentCources {
    private $id;
    private $studentId;
    private $courceId;

    public function __construct($_id, $_studentId, $_courseId) {
        $this->id = $_id;
        $this->studentId = $_studentId;
        $this->courseId = $_courseId;
    }

    public function getId() {
        return $this->id;
    }

    public function getStudentId() {
        return $this->studentId;
    }

    public function getCourseId() {
        return $this->courseId;
    }

    public function setStudentId($studentId) {
        $this->studentId = $studentId;
    }

    public function setCourseId($courseId) {
        $this->courseId = $courseId;
    }
}
?>