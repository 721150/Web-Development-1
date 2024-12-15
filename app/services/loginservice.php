<?php
namespace App\Services;

class LoginService {
    public function validLogin($email, $password) {
        $reposotory = new \App\Repositories\LoginRepository();
        return $reposotory->validLogin($email, $password);
    }
}
?>