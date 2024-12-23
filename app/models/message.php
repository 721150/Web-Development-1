<?php
namespace App\Models;

use JsonSerializable;

class Message implements JsonSerializable {
    private $id;
    private $description;
    private $content;
    private $dateTime;
    private $studentId;
    private $courseId;
    private $image;

    public function __construct($_id, $_description, $_content, $_dateTime, $_studentId, $_courseId, $_image) {
        $this->id = $_id;
        $this->description = $_description;
        $this->content = $_content;
        $this->dateTime = $_dateTime;
        $this->studentId = $_studentId;
        $this->courseId = $_courseId;
        $this->image = $_image;
    }

    public function jsonSerialize(): array
    {
        $var = get_object_vars($this);
        return $var;
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

    public function getImage() {
        return 'data:image/jpeg;base64,' . base64_encode($this->image);
    }

    public function getImageString() {
        return $this->image;
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

    public function setImage($image) {
        if (is_array($image) && isset($image['tmp_name']) && !empty($image['tmp_name'])) {
            $imageData = file_get_contents($image['tmp_name']);
            $this->image = $imageData;
        }
    }
}
?>