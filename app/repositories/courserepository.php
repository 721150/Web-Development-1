<?php
namespace App\Repositories;

use PDO;

class CourseRepository extends Repository {
    
    public function getAll() {
        $stmt = $this->connection->prepare("SELECT * FROM Cource");
        $stmt->execute();

        $courses = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $courses[] = new \App\Models\Course(
                $row['id'],
                $row['name'],
                $row['discipline']
            );
        }

        return $courses;
    }

    public function createCourse($courseName, $courseDescription) {
        $stmt = $this->connection->prepare("INSERT INTO Cource (name, discipline) VALUES (:name, :description)");
        $stmt->bindParam(':name', $courseName);
        $stmt->bindParam(':description', $courseDescription);
        $stmt->execute();

        $stmt = $this->connection->prepare("INSERT INTO teacherCource (courceId, teacherId) VALUES (:courseId, :teacherId)");
        
        $courseId = $this->connection->lastInsertId();
        $teacherId = $_SESSION['teacher']->getTeacherId();
        
        $stmt->bindParam(':courseId', $courseId);
        $stmt->bindParam(':teacherId', $teacherId);
        $stmt->execute();
    }

    public function addStudentToCourse($courseId, $studentId) {
        $stmt = $this->connection->prepare("INSERT INTO StudentCource (courceId, studentId) VALUES (:courseId, :studentId)");
        $stmt->bindParam(':courseId', $courseId);
        $stmt->bindParam(':studentId', $studentId);
        $stmt->execute();
    }
}
?>