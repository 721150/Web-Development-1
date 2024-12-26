<?php
namespace App\Repositories;

use PDO;

class AdminRepository extends Repository {
    
    function getAll() {
        $stmt = $this->connection->prepare("SELECT * FROM `Admin` JOIN User ON Admin.adminId = User.id");
        $stmt->execute();

        $admins = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $admins[] = new \App\Models\Admin(
                $row['id'],
                $row['firstname'],
                $row['lastname'],
                $row['emailAddress'],
                $row['password'],
                $row['image'],
                $row['adminId']
            );
        }

        return $admins;
    }

    public function getById($id) {
        $stmt = $this->connection->prepare("SELECT * FROM `Admin` JOIN User ON Admin.adminId = User.id WHERE User.id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new \App\Models\Admin(
                $row['id'],
                $row['firstname'],
                $row['lastname'],
                $row['emailAddress'],
                $row['password'],
                $row['image'],
                $row['adminId']
            );
        }

        return null;
    }

    public function updateAdmin($admin) {
        $query = "UPDATE `User` SET firstName = :firstName, lastName = :lastName, emailAddress = :email";
    
        $firstName = $admin->getFirstName();
        $lastName = $admin->getLastName();
        $email = $admin->getEmailAddress();
        $id = $admin->getId();
        
        if ($admin->getImageString() !== null) {
            $query .= ", image = :image";
        }
        
        $query .= " WHERE id = :id";
        
        $stmtUser = $this->connection->prepare($query);
        
        $stmtUser->bindParam(':firstName', $firstName);
        $stmtUser->bindParam(':lastName', $lastName);
        $stmtUser->bindParam(':email', $email);
        $stmtUser->bindParam(':id', $id);
        
        if ($admin->getImageString() !== null) {
            $image = $admin->getImageString();
            $stmtUser->bindParam(':image', $image);
        }
        
        $stmtUser->execute();
        
        if ($admin->getPassword()) {
            $stmtPassword = $this->connection->prepare("UPDATE `User` SET password = :password WHERE id = :id");
            $password = password_hash($admin->getPassword(), PASSWORD_DEFAULT);
            $stmtPassword->bindParam(':password', $password);
            $stmtPassword->bindParam(':id', $id);
            $stmtPassword->execute();
        }
    }
}
?>