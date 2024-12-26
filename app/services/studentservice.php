<?php
namespace App\Services;

class StudentService {
    public function getAll() {
        $reposotory = new \App\Repositories\StudentRepository();
        return $reposotory->getAll();
    }

    public function getById($id) {
        $reposotory = new \App\Repositories\StudentRepository();
        return $reposotory->getById($id);
    }
}
?>