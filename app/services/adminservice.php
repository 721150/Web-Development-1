<?php
namespace App\Services;

class AdminService {
    public function getAll() {
        $reposotory = new \App\Repositories\AdminRepository();
        return $reposotory->getAll();
    }

    public function getById($id) {
        $reposotory = new \App\Repositories\AdminRepository();
        return $reposotory->getById($id);
    }

    public function updateAdmin($admin) {
        $reposotory = new \App\Repositories\AdminRepository();
        $reposotory->updateAdmin($admin);
    }
}
?>