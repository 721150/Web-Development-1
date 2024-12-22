<?php
namespace App\Services;

class OpenQuestionnaireService {
    public function loadOpenQusetionnaireByStudent($student) {
        $reposotory = new \App\Repositories\OpenQusetionnaireRepository();
        return $reposotory->loadOpenQusetionnaireByStudent($student);
    }
}
?>