<?php
namespace App\Repositories;

use PDO;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Admin;

class LoginRepository extends Repository {
    
    function __construct() {
        parent::__construct();
    }

    public function validLogin($email, $password) {
        $user = null;
        try {
            $stmt = $this->connection->prepare("SELECT User.id, firstname, lastname, emailAddress, password, image, Student.id AS studentId, about FROM `Student` JOIN `User` ON User.id = Student.studentId WHERE emailAddress = :email");
            $stmt->execute([':email' => $email]);
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result && password_verify($password, $result['password'])) {
                $user = new Student($result['id'], $result['firstname'], $result['lastname'], $result['emailAddress'], null, $result['image'], $result['studentId'], $result['about']);
            }
    
            if ($user == null) {
                $stmt = $this->connection->prepare("SELECT User.id, firstname, lastname, emailAddress, password, image, Teacher.id AS teacherId FROM `Teacher` JOIN `User` ON User.id = Teacher.teacherId WHERE emailAddress = :email");
                $stmt->execute([':email' => $email]);
    
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($result && password_verify($password, $result['password'])) {
                    $user = new Teacher($result['id'], $result['firstname'], $result['lastname'], $result['emailAddress'], null, $result['image'], $result['teacherId']);
                }
            }
            if ($user == null) {
                $stmt = $this->connection->prepare("SELECT User.id, firstname, lastname, emailAddress, password, image, Admin.id AS adminId FROM `Admin` JOIN `User` ON User.id = Admin.adminId WHERE emailAddress = :email");
                $stmt->execute([':email' => $email]);
    
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($result && password_verify($password, $result['password'])) {
                    $user = new Admin($result['id'], $result['firstname'], $result['lastname'], $result['emailAddress'], null, $result['image'], $result['adminId']);
                }
            }
        } catch (Exception $e) {}
    
        return $user;
    }
}
?>