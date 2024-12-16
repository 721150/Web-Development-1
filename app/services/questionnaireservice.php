<?php
namespace App\Services;

class QuestionnaireService {
    public function getAll() {
        $reposotory = new \App\Reposotories\QuestionnaireRepository();
        return $reposotory->getAll();
    }

    public function insert() {
        $reposotory = new \App\Reposotories\QuestionnaireRepository();
        return $reposotory->insert();
    }

    public function getById($id) {
        $reposotory = new \App\Reposotories\QuestionnaireRepository();
        return $reposotory->getById($id);
    }
}
?>