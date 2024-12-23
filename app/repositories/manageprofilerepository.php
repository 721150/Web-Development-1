<?php
namespace App\Repositories;

use PDO;
use App\Models\Student;

class ManageProfileRepository extends Repository {
    
    function __construct() {
        parent::__construct();
    }

    public function updateStudent($student) {
        $sqlUser = "UPDATE `User` SET firstName = :firstName, lastName = :lastName, emailAddress = :email, password = :password, image = :image WHERE id = :id";
        $stmtUser = $this->connection->prepare($sqlUser);

        $firstName = $student->getFirstName();
        $lastName = $student->getLastName();
        $email = $student->getEmailAddress();
        $password = $student->getPassword();
        $image = $student->getImage();
        $id = $student->getId();

        $stmtUser->bindParam(':firstName', $firstName);
        $stmtUser->bindParam(':lastName', $lastName);
        $stmtUser->bindParam(':email', $email);
        $stmtUser->bindParam(':password', $password);
        $stmtUser->bindParam(':image', $image);
        $stmtUser->bindParam(':id', $id);

        $stmtUser->execute();

        $sqlStudent = "UPDATE `Student` SET about = :about WHERE studentId = :id";
        $stmtStudent = $this->connection->prepare($sqlStudent);

        $about = $student->getAbout();

        $stmtStudent->bindParam(':about', $about);
        $stmtStudent->bindParam(':id', $id);

        $stmtStudent->execute();
    }
}
?>