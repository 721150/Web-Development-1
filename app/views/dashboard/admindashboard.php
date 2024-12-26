<?php
namespace App\Views;
include __DIR__ . '/../headeradmin.php';
$allTeachers = $_SESSION['allTeachers'];
$allStudents = $_SESSION['allStudents'];
$allAdmins = $_SESSION['allAdmins'];
?>
<h1>Docenten, Studenten en Beheerders</h1>
<input type="text" id="searchInput" class="form-control mb-3" placeholder="Zoek op naam...">
<div class="row">
    <div class="col-md-4">
        <h2>Docenten</h2>
        <div id="teacherResults">
            <?php foreach ($allTeachers as $teacher): ?>
                <div class="card mb-2 teacher" data-name="<?= htmlspecialchars($teacher->getFullName()) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($teacher->getFullName()) ?></h5>
                        <a href="/profile.php?id=<?= htmlspecialchars($teacher->getId()) ?>" class="btn btn-primary">Bekijk Profiel</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-md-4">
        <h2>Studenten</h2>
        <div id="studentResults">
            <?php foreach ($allStudents as $student): ?>
                <div class="card mb-2 student" data-name="<?= htmlspecialchars($student->getFullName()) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($student->getFullName()) ?></h5>
                        <a href="/profile.php?id=<?= htmlspecialchars($student->getId()) ?>" class="btn btn-primary">Bekijk Profiel</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-md-4">
        <h2>Beheerders</h2>
        <div id="adminResults">
            <?php foreach ($allAdmins as $admin): ?>
                <div class="card mb-2 admin" data-name="<?= htmlspecialchars($admin->getFullName()) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($admin->getFullName()) ?></h5>
                        <a href="/profile.php?id=<?= htmlspecialchars($admin->getId()) ?>" class="btn btn-primary">Bekijk Profiel</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    function displayResults(searchValue = '') {
        const teacherResults = document.querySelectorAll('#teacherResults .teacher');
        const studentResults = document.querySelectorAll('#studentResults .student');
        const adminResults = document.querySelectorAll('#adminResults .admin');

        teacherResults.forEach(teacher => {
            const name = teacher.getAttribute('data-name').toLowerCase();
            teacher.style.display = name.includes(searchValue) ? '' : 'none';
        });

        studentResults.forEach(student => {
            const name = student.getAttribute('data-name').toLowerCase();
            student.style.display = name.includes(searchValue) ? '' : 'none';
        });

        adminResults.forEach(admin => {
            const name = admin.getAttribute('data-name').toLowerCase();
            admin.style.display = name.includes(searchValue) ? '' : 'none';
        });
    }

    document.getElementById('searchInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        displayResults(searchValue);
    });

    displayResults();
</script>
<?php
include __DIR__ . '/../footer.php';
?>