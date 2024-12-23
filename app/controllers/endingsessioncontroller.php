<?php
namespace App\Controllers;

class EndingSessionController {
    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function endSession() {
        session_unset();
        header('Location: /');
        exit;
    }
}
?>