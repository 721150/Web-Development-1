<?php
namespace App\Services;

class CourseService {
    public function getAll() {
        $reposotory = new \App\Repositories\CourseRepository();
        return $reposotory->getAll();
    }
}
?>