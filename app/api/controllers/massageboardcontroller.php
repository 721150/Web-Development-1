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
            $messages = $this->MassageService->getAllWithoutTeacher();
            $messagesJSON = json_encode($messages);
            echo $messagesJSON;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $messageJSON = file_get_contents('php://input');
            $messageData = json_decode($messageJSON, true);

            if (isset($messageData['photo'])) {
            $base64Image = $messageData['photo'];
            $imageData = base64_decode($base64Image);
            }
            else {
                $imageData = null;
            }

            $message = new Message(null, $messageData['subject'], $messageData['message'], null, $_SESSION['student']->getStudentId(), $messageData['course'], $imageData);
            $this->MassageService->insert($message);
        }
    }
}
?>