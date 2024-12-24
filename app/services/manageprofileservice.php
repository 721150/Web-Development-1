<?php
namespace App\Services;

class ManageProfileService {
    public function updateStudent($student) {
        $reposotory = new \App\Repositories\ManageProfileRepository();
        $reposotory->updateStudent($student);
    }

    public function deleteProfile($student) {
        $reposotory = new \App\Repositories\ManageProfileRepository();
        $reposotory->deleteProfile($student);
    }
}
?>