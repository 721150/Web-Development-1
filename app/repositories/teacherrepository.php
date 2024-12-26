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

    public function getById($id) {
        $stmt = $this->connection->prepare("SELECT * FROM Teacher JOIN User ON Teacher.teacherId = User.id WHERE User.id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new \App\Models\Teacher(
                $row['id'],
                $row['firstname'],
                $row['lastname'],
                $row['emailAddress'],
                $row['password'],
                $row['image'],
                $row['teacherId']
            );
        }

        return null;
    }

    public function updateTeacher($teacher) {
        $query = "UPDATE `User` SET firstName = :firstName, lastName = :lastName, emailAddress = :email";
    
        $firstName = $teacher->getFirstName();
        $lastName = $teacher->getLastName();
        $email = $teacher->getEmailAddress();
        $id = $teacher->getId();
        
        if ($teacher->getImageString() !== null) {
            $query .= ", image = :image";
        }
        
        $query .= " WHERE id = :id";
        
        $stmtUser = $this->connection->prepare($query);
        
        $stmtUser->bindParam(':firstName', $firstName);
        $stmtUser->bindParam(':lastName', $lastName);
        $stmtUser->bindParam(':email', $email);
        $stmtUser->bindParam(':id', $id);
        
        if ($teacher->getImageString() !== null) {
            $image = $teacher->getImageString();
            $stmtUser->bindParam(':image', $image);
        }
        
        $stmtUser->execute();
        
        if ($teacher->getPassword()) {
            $stmtPassword = $this->connection->prepare("UPDATE `User` SET password = :password WHERE id = :id");
            $password = password_hash($teacher->getPassword(), PASSWORD_DEFAULT);
            $stmtPassword->bindParam(':password', $password);
            $stmtPassword->bindParam(':id', $id);
            $stmtPassword->execute();
        }
    }
}
?>