<?php
namespace App\Services;

class StudentService {
    public function getAll() {
        $reposotory = new \App\Reposotories\StudentRepository();
        return $reposotory->getAll();
    }

    public function insert() {
        $reposotory = new \App\Reposotories\StudentRepository();
        return $reposotory->insert();
    }
}
?>