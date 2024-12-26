<?php
namespace App\Services;

class RegisterService {
    public function addStudent($student) {
        $reposotory = new \App\Repositories\RegisterRepository();
        $reposotory->addStudent($student);
    }

    public function addTeacher($teacher) {
        $reposotory = new \App\Repositories\RegisterRepository();
        $reposotory->addTeacher($teacher);
    }
}
?>