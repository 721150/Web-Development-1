<?php
namespace App\Reposotories;

use PDO;

class StudentRepository extends Repository {
    
    function validLogin($email, $password) {
        $validLogin = false;
        try {
            $stmt = $this->connection->prepare("SELECT * FROM [User] WHERE emailAddress = :email");
            $stmt->execute([':email' => $email]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user != null)) {
                $validLogin = true;
            }
        } catch (Exception $e) {}

        return $validLogin;
    }
}
?>