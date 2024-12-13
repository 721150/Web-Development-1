<?php
namespace App\Reposotories;

use PDO;

class StudentRepository extends Repository {
    
    function getAll() {
        $stmt = $this->connection->prepare("SELECT * FROM Student JOIN User ON Student.studentId = User.id");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Article');
        $students = $stmt->fetchAll();

        return $students;
    }

    public function insert($student) {
        $this->connection->beginTransaction();

        $stmt = $this->connection->prepare("
            INSERT INTO [User] (firstName, lastName, emailAddress, [password], [image]) 
            VALUES (:firstName, :lastName, :emailAddress, :password, :image)
        ");
        $stmt->execute([
            ':firstName' => $student->getFirstName(), 
            ':lastName' => $student->getLastName(), 
            ':emailAddress' => $student->getEmailAddress(),
            ':password' => $student->getPassword(),
            ':image' => $student->getImage()
        ]);

        $userId = $this->connection->lastInsertId();

        $stmt = $this->connection->prepare("
            INSERT INTO Student (studentId, about) 
            VALUES (:studentId, :about)
        ");
        $results = $stmt->execute([
            ':studentId' => $userId, 
            ':about' => $student->getAbout()
        ]);

        $this->connection->commit();
        return $results;
    }
}
?>