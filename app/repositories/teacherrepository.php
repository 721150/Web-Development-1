<?php
namespace App\Repositories;

use PDO;

class TeacherRepository extends Repository {
    
    function getAll() {
        $stmt = $this->connection->prepare("SELECT * FROM Teacher JOIN User ON Teacher.teacherId = User.id");
        $stmt->execute();

        $teachers = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $teachers[] = new \App\Models\Teacher(
                $row['id'],
                $row['firstname'],
                $row['lastname'],
                $row['emailAddress'],
                $row['password'],
                $row['image'],
                $row['teacherId']
            );
        }

        return $teachers;
    }
}
?>