<?php
namespace App\Services;

class TeacherService {
    public function getAll() {
        $reposotory = new \App\Repositories\TeacherRepository();
        return $reposotory->getAll();
    }

    public function getById($id) {
        $reposotory = new \App\Repositories\TeacherRepository();
        return $reposotory->getById($id);
    }
}
?>