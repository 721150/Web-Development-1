<?php
namespace App\Controllers;

class EndingSession {
    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function end_session() {
        session_unset();
        header('Location: /');
        exit;
    }
}
?>