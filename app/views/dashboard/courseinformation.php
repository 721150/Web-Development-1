<?php
namespace App\Views;
include __DIR__ . '/../header.php';
$allTeachers = $_SESSION['allTeachers'];
$allCourses = $_SESSION['allCourses'];
?>
<h1>Docenten en Cursussen</h1>
<input type="text" id="searchInput" class="form-control mb-3" placeholder="Zoek op naam...">
<div class="row">
    <div class="col-md-6">
        <h2>Docenten</h2>
        <div id="teacherResults">
            <?php foreach ($allTeachers as $teacher): ?>
                <div class="card mb-2 teacher" data-name="<?= htmlspecialchars($teacher->getFirstName() . ' ' . htmlspecialchars($teacher->getLastName())) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($teacher->getFirstName() . ' ' . htmlspecialchars($teacher->getLastName())) ?></h5>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-md-6">
        <h2>Cursussen</h2>
        <div id="courseResults">
            <?php foreach ($allCourses as $course): ?>
                <div class="card mb-2 course" data-name="<?= htmlspecialchars($course->getName()) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($course->getName()) ?></h5>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    function displayResults(searchValue = '') {
        const teacherResults = document.querySelectorAll('#teacherResults .teacher');
        const courseResults = document.querySelectorAll('#courseResults .course');

        teacherResults.forEach(teacher => {
            const name = teacher.getAttribute('data-name').toLowerCase();
            teacher.style.display = name.includes(searchValue) ? '' : 'none';
        });

        courseResults.forEach(course => {
            const name = course.getAttribute('data-name').toLowerCase();
            course.style.display = name.includes(searchValue) ? '' : 'none';
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