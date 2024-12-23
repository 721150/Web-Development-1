<?php
namespace App\Services;

class ManageProfileService {
    public function updateStudent($student) {
        $reposotory = new \App\Repositories\ManageProfileRepository();
        return $reposotory->updateStudent($student);
    }
}
?>