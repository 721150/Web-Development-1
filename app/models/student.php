<?php
namespace App\Models;

class Student extends User {
    private $studentId;
    private $about;

    public function __construct($_id, $_firstName, $_lastName, $_emailAddress, $_password, $_image, $_studentId, $_about) {
        parent::__construct($_id, $_firstName, $_lastName, $_emailAddress, $_password, $_image);
        $this->studentId = $_studentId;
        $this->about = $_about;
    }

    public function getStudentId() {
        return $this->studentId;
    }

    public function getAbout() {
        return $this->about;
    }

    public function setAbout($about) {
        $this->about = $about;
    }
}
?>