<?php
namespace App\Repositories;

use PDO;

class CourseRepository extends Repository {
    
    function getAll() {
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
}
?>