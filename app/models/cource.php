<?php
namespace App\Models;

class Course {
    private $id;
    private $name;
    private $discription;
    
    public function __construct($_id, $_name, $_description) {
        $this->id = $_id;
        $this->name = $_name;
        $this->description = $_description;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
}
?>