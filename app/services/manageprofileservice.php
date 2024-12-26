<?php
namespace App\Services;

class ManageProfileService {
    public function updateStudent($student) {
        $reposotory = new \App\Repositories\ManageProfileRepository();
        $reposotory->updateStudent($student);
    }

    public function deleteProfile($user) {
        $reposotory = new \App\Repositories\ManageProfileRepository();
        $reposotory->deleteProfile($user);
    }

    public function deleteProfileById($id) {
        $reposotory = new \App\Repositories\ManageProfileRepository();
        $reposotory->deleteProfileById($id);
    }
}
?>