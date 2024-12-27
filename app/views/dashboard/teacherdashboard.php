<?php
namespace App\Views;
include __DIR__ . '/../headerteacher.php';
?>
<h2>Cursus Aanmaken</h2>
<form method="POST">
    <div class="mb-3">
        <label for="courseName" class="form-label">Cursusnaam</label>
        <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Voer cursusnaam in" require>
    </div>
    <div class="mb-3">
        <label for="courseDescription" class="form-label">Cursusbeschrijving</label>
        <input type="text" class="form-control" id="courseDescription" name="courseDescription" placeholder="Voer cursusbeschrijving in" require>
    </div>
    <input type="hidden" name="new_cource" value="new_cource">
    <button type="submit" class="btn btn-success">Cursus Aanmaken</button>
</form>
<h2>Cursus Kiezen</h2>
<form method="POST">
    <div class="mb-3">
        <label for="courseSelect" class="form-label">Kies een cursus</label>
        <select class="form-select" id="courseSelect" name="course_id">
            <?php foreach ($_SESSION['allCourses'] as $cource): ?>
                <option value="<?= htmlspecialchars($cource->getId()); ?>"><?= htmlspecialchars($cource->getName()); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <h2 class="mt-5">Studenten Toevoegen</h2>
    <div class="mb-3">
        <label for="studentSelect" class="form-label">Kies studenten</label>
        <select multiple class="form-select" id="studentSelect" name="student_ids[]">
            <?php foreach ($_SESSION['allStudents'] as $student): ?>
                <option value="<?= htmlspecialchars($student->getStudentId()); ?>"><?= htmlspecialchars($student->getFullName()); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="hidden" name="add_student" value="add_student">
    <button type="submit" class="btn btn-success">Studenten Toevoegen</button>
</form>
<?php
include __DIR__ . '/../footer.php';
?>