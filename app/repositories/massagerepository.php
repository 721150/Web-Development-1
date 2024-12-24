<?php
namespace App\Repositories;

use PDO;
use App\Models\Message;
use App\Models\Course;

class MassageRepository extends Repository {
    
    function __construct() {
        parent::__construct();
    }

    public function loadCourcesByStudent($student) {
        $listOfCources = [];
        try {
            $stmt = $this->connection->prepare("SELECT Cource.id, Cource.name, Cource.discipline FROM `Cource` JOIN `StudentCource` ON Cource.id = StudentCource.courceId WHERE StudentCource.studentId = :studentId;");
            $stmt->execute([':studentId' => $student->getStudentId()]);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cource = new Course($row['id'], $row['name'], $row['discipline']);
                $listOfCources[] = $cource;
            }
        } catch (Exception $e) {}

        return $listOfCources;
    }

    public function getAll() {
        $messages = [];
        try {
            $stmt = $this->connection->prepare("SELECT `id`, `description`, `content`, `time`, `courceId`, `studentId`, `image` FROM `Message`");
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $message = new Message($row['id'], $row['description'], $row['content'], $row['time'], $row['studentId'], $row['courceId'], $row['image']);
                $messages[] = $message;
            }
        } catch (Exception $e) {}

        return $messages;
    }

    public function insert($message) {   
        try {
            $stmt = $this->connection->prepare("INSERT INTO `Message` (`description`, `content`, `time`, `courceId`, `studentId`, `image`) VALUES (:description, :content, current_timestamp(), :courseId, :studentId, :image)");
            $stmt->execute([
                ':description' => $message->getDescription(),
                ':content' => $message->getContent(),
                ':courseId' => $message->getCourseId(),
                ':studentId' => $message->getStudentId(),
                ':image' => $message->getImageString()
            ]);
        } catch (Exception $e) {}    
    }
}
?>