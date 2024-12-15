<?php
namespace App\Repositories;

use PDO;

class LoginRepository extends Repository {
    
    function __construct() {
        parent::__construct();
    }

    public function validLogin($email, $password) {
        $validLogin = false;
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `User` WHERE emailAddress = :email AND password = :password");
            $stmt->execute([':email' => $email,
                            ':password' => $password]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user != null) {
                $validLogin = true;
            }
        } catch (Exception $e) {}

        return $validLogin;
    }
}
?>