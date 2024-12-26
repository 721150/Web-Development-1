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
}
?>