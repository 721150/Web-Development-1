<?php
namespace App\Controllers;

class EndingSession {

    public function end_session() {
        session_unset();
        session_destroy();
        require("../views/home/login.php");
        exit;
    }
}
?>