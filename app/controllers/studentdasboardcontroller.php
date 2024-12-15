<?php
namespace App\Controllers;

class StudentDasboardController {
    function __construct() {
        
    }

    public function index() {
        require __DIR__ . '/../views/dashboard/studentdasboard.php';
    }

    public function endSession() {
        $endingSession = new EndingSession();
        $endingSession->end_session();
        exit;
    }
}
?>