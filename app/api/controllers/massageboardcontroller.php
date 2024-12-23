<?php
namespace App\Api\Controllers;

use App\Models\Message;

class MassageBoardController {
    private $MassageService;
    
    function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->MassageService = new \App\Services\MassageService();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $messages = $this->MassageService->getAll();
            $messagesJSON = json_encode($messages);
            echo $messagesJSON;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $messageJSON = file_get_contents('php://input');
            $messageData = json_decode($messageJSON, true);
            $message = new Message(null, $messageData['subject'], $messageData['message'], null, $_SESSION['student']->getStudentId(), $messageData['course'], $messageData['photo']);
            $this->MassageService->insert($message);
        }
    }
}
?>