<?php
namespace App\Controllers;

class HomeController extends LoginController {
    private $studentService;

    function __construct() {
        parent::__construct();
        $this->studentService = new \App\Services\StudentService();
    }

    public function index() {
        session_start();
        //$students = $this->studentService->getAll();
        if (!$this->checkLogin()) {
            $this->login();
        } else {
            require __DIR__ . '/../views/dashboard/studentdasboard.php';
            exit;
        }
    }
}
?>