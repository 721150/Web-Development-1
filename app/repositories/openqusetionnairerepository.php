<?php
namespace App\Repositories;

use PDO;
use App\Models\Course;

class OpenQusetionnaireRepository extends Repository {
    
    function __construct() {
        parent::__construct();
    }

    public function loadOpenQusetionnaireByStudent($student) {
        $listOfQuestionnaire = [];
        try {
            $stmt = $this->connection->prepare("SELECT Cource.id, Cource.name, Cource.discipline FROM `StudentCource` JOIN `Cource` ON Cource.id = StudentCource.courceId LEFT JOIN `Assessment` ON StudentCource.studentId = Assessment.studentId AND StudentCource.courceId = Assessment.courceId WHERE StudentCource.studentId = :studentId AND Assessment.id IS NULL");
            $stmt->execute([':studentId' => $student->getStudentId()]);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $questionnaire = new Course($row['id'], $row['name'], $row['discipline']);
                $listOfQuestionnaire[] = $questionnaire;
            }
        } catch (Exception $e) {}

        return $listOfQuestionnaire;
    }
}
?>