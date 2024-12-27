<?php
namespace App\Services;

class CourseService {
    public function getAll() {
        $reposotory = new \App\Repositories\CourseRepository();
        return $reposotory->getAll();
    }

    public function createCourse($courseName, $courseDescription) {
        $reposotory = new \App\Repositories\CourseRepository();
        $reposotory->createCourse($courseName, $courseDescription);
    }

    public function addStudentToCourse($courseId, $studentId) {
        $reposotory = new \App\Repositories\CourseRepository();
        $reposotory->addStudentToCourse($courseId, $studentId);
    }
}
?>