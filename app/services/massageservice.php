<?php
namespace App\Services;

class MassageService {
    public function loadCourcesByStudent($student) {
        $reposotory = new \App\Repositories\MassageRepository();
        return $reposotory->loadCourcesByStudent($student);
    }

    public function getAll() {
        $reposotory = new \App\Repositories\MassageRepository();
        return $reposotory->getAll();
    }
}
?>