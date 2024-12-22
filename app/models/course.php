<?php
namespace App\Models;

class Course {
    private $id;
    private $name;
    private $discipline;
    
    public function __construct($_id, $_name, $_discipline) {
        $this->id = $_id;
        $this->name = $_name;
        $this->discipline = $_discipline;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDiscipline() {
        return $this->discipline;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDiscipline($discipline) {
        $this->discipline = $discipline;
    }
}
?>