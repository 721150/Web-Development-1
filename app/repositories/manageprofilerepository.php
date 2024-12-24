<?php
namespace App\Repositories;

use PDO;
use App\Models\Student;

class ManageProfileRepository extends Repository {
    
    function __construct() {
        parent::__construct();
    }

    public function updateStudent($student) {
        $stmtUser = $this->connection->prepare("UPDATE `User` SET firstName = :firstName, lastName = :lastName, emailAddress = :email, password = :password, image = :image WHERE id = :id");

        $firstName = $student->getFirstName();
        $lastName = $student->getLastName();
        $email = $student->getEmailAddress();
        $password = $student->getPassword();
        $image = $student->getImageString();
        $id = $student->getId();

        $stmtUser->bindParam(':firstName', $firstName);
        $stmtUser->bindParam(':lastName', $lastName);
        $stmtUser->bindParam(':email', $email);
        $stmtUser->bindParam(':password', $password);
        $stmtUser->bindParam(':image', $image);
        $stmtUser->bindParam(':id', $id);

        $stmtUser->execute();

        $stmtStudent = $this->connection->prepare("UPDATE `Student` SET about = :about WHERE studentId = :id");

        $about = $student->getAbout();

        $stmtStudent->bindParam(':about', $about);
        $stmtStudent->bindParam(':id', $id);

        $stmtStudent->execute();
    }

    public function deleteProfile($student) {
        $stmtUser = $this->connection->prepare("DELETE FROM `User` WHERE id = :id");
        
        $id = $student->getId();
        
        $stmtUser->bindParam(':id', $id);

        $stmtUser->execute();
    }
}
?>