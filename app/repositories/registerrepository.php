<?php
namespace App\Repositories;

use PDO;

class RegisterRepository extends Repository {
    
    function __construct() {
        parent::__construct();
    }

    public function addStudent($student) {
        $stmtCheck = $this->connection->prepare("SELECT COUNT(*) FROM `User` WHERE emailAddress = :email");
        $email = $student->getEmailAddress();
        $stmtCheck->bindParam(':email', $email);
        $stmtCheck->execute();
        $emailExists = $stmtCheck->fetchColumn();

        if (!$emailExists) {
            $stmtUser = $this->connection->prepare("INSERT INTO `User` (firstName, lastName, emailAddress, image, password) VALUES (:firstName, :lastName, :email, :image, :password)");

            $firstName = $student->getFirstName();
            $lastName = $student->getLastName();
            $email = $student->getEmailAddress();
            $image = $student->getImageString();
            $password = password_hash($student->getPassword(), PASSWORD_DEFAULT);

            $stmtUser->bindParam(':firstName', $firstName);
            $stmtUser->bindParam(':lastName', $lastName);
            $stmtUser->bindParam(':email', $email);
            $stmtUser->bindParam(':image', $image);
            $stmtUser->bindParam(':password', $password);

            $stmtUser->execute();

            $userId = $this->connection->lastInsertId();

            $stmtStudent = $this->connection->prepare("INSERT INTO `Student` (studentId) VALUES (:id)");

            $stmtStudent->bindParam(':id', $userId);

            $stmtStudent->execute();
        }
    }

    public function addTeacher($teacher) {
        $stmtCheck = $this->connection->prepare("SELECT COUNT(*) FROM `User` WHERE emailAddress = :email");
        $email = $teacher->getEmailAddress();
        $stmtCheck->bindParam(':email', $email);
        $stmtCheck->execute();
        $emailExists = $stmtCheck->fetchColumn();

        if (!$emailExists) {
            $stmtUser = $this->connection->prepare("INSERT INTO `User` (firstName, lastName, emailAddress, image, password) VALUES (:firstName, :lastName, :email, :image, :password)");
        
            $firstName = $teacher->getFirstName();
            $lastName = $teacher->getLastName();
            $email = $teacher->getEmailAddress();
            $image = $teacher->getImageString();
            $password = password_hash($teacher->getPassword(), PASSWORD_DEFAULT);
        
            $stmtUser->bindParam(':firstName', $firstName);
            $stmtUser->bindParam(':lastName', $lastName);
            $stmtUser->bindParam(':email', $email);
            $stmtUser->bindParam(':image', $image);
            $stmtUser->bindParam(':password', $password);
        
            $stmtUser->execute();
        
            $userId = $this->connection->lastInsertId();
        
            $stmtTeacher = $this->connection->prepare("INSERT INTO `Teacher` (teacherId) VALUES (:id)");
        
            $stmtTeacher->bindParam(':id', $userId);
        
            $stmtTeacher->execute();
        }
    }
}
?>