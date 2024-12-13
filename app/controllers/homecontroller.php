<?php
namespace App\Controllers;

class HomeController {
    private $studentService;

    function __constructor() {
        $this->studentService = new \App\Services\StudentService();
    }

    public function index() {
        //$students = $this->studentService->getAll();
        require_once("../views/home/index.php");
    }
}
?>