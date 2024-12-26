<?php
namespace App\Repositories;

use PDO;
use App\Models\Student;

class ManageProfileRepository extends Repository {
    
    function __construct() {
        parent::__construct();
    }

    public function updateStudent($student) {
        $stmtUser = $this->connection->prepare("UPDATE `User` SET firstName = :firstName, lastName = :lastName, emailAddress = :email, image = :image WHERE id = :id");
    
        $firstName = $student->getFirstName();
        $lastName = $student->getLastName();
        $email = $student->getEmailAddress();
        $image = $student->getImageString();
        $id = $student->getId();
    
        $stmtUser->bindParam(':firstName', $firstName);
        $stmtUser->bindParam(':lastName', $lastName);
        $stmtUser->bindParam(':email', $email);
        $stmtUser->bindParam(':image', $image);
        $stmtUser->bindParam(':id', $id);
    
        $stmtUser->execute();
    
        if ($student->getPassword()) {
            $stmtPassword = $this->connection->prepare("UPDATE `User` SET password = :password WHERE id = :id");
            $password = password_hash($student->getPassword(), PASSWORD_DEFAULT);
            $stmtPassword->bindParam(':password', $password);
            $stmtPassword->bindParam(':id', $id);
            $stmtPassword->execute();
        }
    
        $stmtStudent = $this->connection->prepare("UPDATE `Student` SET about = :about WHERE studentId = :id");
    
        $about = $student->getAbout();
    
        $stmtStudent->bindParam(':about', $about);
        $stmtStudent->bindParam(':id', $id);
    
        $stmtStudent->execute();
    }

    public function deleteProfile($user) {
        $stmtUser = $this->connection->prepare("DELETE FROM `User` WHERE id = :id");
        
        $id = $user->getId();
        
        $stmtUser->bindParam(':id', $id);

        $stmtUser->execute();
    }

    public function deleteProfileById($id) {
        $stmtUser = $this->connection->prepare("DELETE FROM `User` WHERE id = :id");
        
        $stmtUser->bindParam(':id', $id);

        $stmtUser->execute();
    }
}
?>