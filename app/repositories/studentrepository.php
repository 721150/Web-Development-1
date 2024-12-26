<?php
namespace App\Repositories;

use PDO;

class StudentRepository extends Repository {
    
    function getAll() {
        $stmt = $this->connection->prepare("SELECT * FROM Student JOIN User ON Student.studentId = User.id");
        $stmt->execute();

        $students = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $students[] = new \App\Models\Student(
                $row['id'],
                $row['firstname'],
                $row['lastname'],
                $row['emailAddress'],
                $row['password'],
                $row['image'],
                $row['studentId'],
                $row['about']
            );
        }

        return $students;
    }
}
?>