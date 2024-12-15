<?php
namespace App\Repositories;

use PDO;
use App\Models\Student;
use App\Models\Teacher;

class LoginRepository extends Repository {
    
    function __construct() {
        parent::__construct();
    }

    public function validLogin($email, $password) {
        $user = null;
        try {
            $stmt = $this->connection->prepare("SELECT * FROM `Student` JOIN `User` ON User.id = Student.studentId WHERE emailAddress = :email AND password = :password");
            $stmt->execute([':email' => $email,
                            ':password' => $password]);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $user = new Student($result['id'], $result['firstname'], $result['lastname'], $result['emailAddress'], $result['password'], $result['image'], $result['studentId'], $result['about']);
            }

            if ($user == null) {
                $stmt = $this->connection->prepare("SELECT * FROM `Teacher` JOIN `User` ON User.id = Teacher.teacherId WHERE emailAddress = :email AND password = :password");
                $stmt->execute([':email' => $email,
                                ':password' => $password]);

                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($result) {
                    $user = new Teacher($result['id'], $result['firstname'], $result['lastname'], $result['emailAddress'], $result['password'], $result['image'], $result['teacherId']);
                }
            }
        } catch (Exception $e) {}

        return $user;
    }
}
?>