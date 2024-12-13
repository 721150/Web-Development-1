<?php
namespace App\Models

class TeacherCources {
    private $id;
    private $teacherId;
    private $courceId;

    public function __construct($_id, $_teacherId, $_courseId) {
        $this->id = $_id;
        $this->teacherId = $_teacherId;
        $this->courseId = $_courseId;
    }

    public function getId() {
        return $this->id;
    }

    public function getTeacherId() {
        return $this->teacherId;
    }

    public function getCourseId() {
        return $this->courseId;
    }

    public function setTeacherId($teacherId) {
        $this->teacherId = $teacherId;
    }

    public function setCourseId($courseId) {
        $this->courseId = $courseId;
    }
}
?>