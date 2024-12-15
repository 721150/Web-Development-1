<?php
namespace App\Controllers;

class EndingSession {

    public function end_session() {
        session_unset();
        $startSession = new HomeController();
        $startSession->index();
        exit;
    }
}
?>