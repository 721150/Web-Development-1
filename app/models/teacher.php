<?php
namespace App\Models

class Teacher extends User {
    private $teacherId;

    public function __construct($_id, $_firstName, $_lastName, $_emailAddress, $_password, $_image, $_teacherId) {
        parent::__construct($_id, $_firstName, $_lastName, $_emailAddress, $_password, $_image);
        $this->teacherId = $_teacherId;
    }

    public function getTeacherId() {
        return $this->teacherId;
    }
}
?>