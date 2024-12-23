<?php
namespace App\Services;

class QuestionnaireService {
    public function getAll() {
        $reposotory = new \App\Repositories\QuestionnaireRepository();
        return $reposotory->getAll();
    }

    public function insert($assessment) {
        $reposotory = new \App\Repositories\QuestionnaireRepository();
        $reposotory->insert($assessment);
    }

    public function getById($id) {
        $reposotory = new \App\Repositories\QuestionnaireRepository();
        return $reposotory->getById($id);
    }

    public function loadOpenQusetionnaireByStudent($student) {
        $reposotory = new \App\Repositories\QuestionnaireRepository();
        return $reposotory->loadOpenQusetionnaireByStudent($student);
    }
}
?>