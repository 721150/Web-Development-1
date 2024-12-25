<?php
namespace App\Views;
include __DIR__ . '/../header.php';
?>
<div class="mb-4">
    <h2>Resultaten van de Vragenlijsten</h2>
    <div class="mb-3">
        <label for="searchCourse" class="form-label">Zoek op cursus:</label>
        <input type="text" id="searchCourse" class="form-control" placeholder="Voer cursusnaam in">
    </div>
    <div class="mb-3">
        <label for="sortQuestionnaires" class="form-label">Sorteer op:</label>
        <select id="sortQuestionnaires" class="form-select">
            <option value="date">Datum/Tijd</option>
            <option value="course">Cursus</option>
        </select>
    </div>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Cursus</th>
            <th>Docent</th>
            <th>Gemiddelde Score</th>
            <th>Actie</th>
        </tr>
    </thead>
    <tbody id="questionnaireResults">
    <?php foreach ($_SESSION['results'] as $questionnaire): ?>
        <tr data-date="<?= htmlspecialchars($questionnaire['date'] ?? ''); ?>" data-course="<?= htmlspecialchars($questionnaire['name'] ?? ''); ?>">
            <td><?= htmlspecialchars($questionnaire['name'] ?? ''); ?></td>
            <td><?= htmlspecialchars($questionnaire['teacher'] ?? ''); ?></td>
            <td><?= htmlspecialchars($questionnaire['score'] ?? ''); ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="selected_questionnaire" value="<?= htmlspecialchars($questionnaire['id']); ?>">
                    <button type="submit" class="btn btn-success">Open Vragenlijst</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<div>
    <h2>Geplaatste Berichten</h2>
    <div class="mb-3">
        <label for="sortMessages" class="form-label">Sorteer op:</label>
        <select id="sortMessages" class="form-select">
            <option value="date">Datum/Tijd</option>
            <option value="course">Cursus</option>
        </select>
    </div>
    <ul id="messages" class="list-group">
        <?php foreach ($_SESSION['messages'] as $message): ?>
            <li class="list-group-item" data-date="<?= htmlspecialchars($message['message']->getDateTime() ?? ''); ?>" data-course="<?= htmlspecialchars($message['message']->getCourseId() ?? ''); ?>">
                <strong><?= htmlspecialchars($message['message']->getCourseId() ?? ''); ?></strong> - Docent: <strong><?= htmlspecialchars($message['teacher'] ?? ''); ?></strong> - <?= htmlspecialchars($message['message']->getDescription() ?? ''); ?>
                <p><?= htmlspecialchars($message['message']->getContent() ?? ''); ?></p>
                <?php if (!empty($message['message']->getImageString())): ?>
                    <img src="<?= htmlspecialchars($message['message']->getImage() ?? ''); ?>" alt="Foto" class="img-fluid mt-2">
                <?php endif; ?>
                <span class="badge bg-secondary float-end"><?= htmlspecialchars($message['message']->getDateTime() ?? ''); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<script>
    document.getElementById('sortQuestionnaires').addEventListener('change', function() {
        var sortBy = this.value;
        var tbody = document.getElementById('questionnaireResults');
        var rows = Array.from(tbody.querySelectorAll('tr'));

        rows.sort(function(a, b) {
            var aValue = a.getAttribute('data-' + sortBy);
            var bValue = b.getAttribute('data-' + sortBy);

            if (sortBy === 'date') {
                return bValue.localeCompare(aValue);
            } else {
                return aValue.localeCompare(bValue);
            }
        });

        rows.forEach(function(row) {
            tbody.appendChild(row);
        });
    });

    document.getElementById('sortMessages').addEventListener('change', function() {
        var sortBy = this.value;
        var ul = document.getElementById('messages');
        var items = Array.from(ul.querySelectorAll('li'));

        items.sort(function(a, b) {
            var aValue = a.getAttribute('data-' + sortBy);
            var bValue = b.getAttribute('data-' + sortBy);

            if (sortBy === 'date') {
                return bValue.localeCompare(aValue);
            } else {
                return aValue.localeCompare(bValue);
            }
        });

        items.forEach(function(item) {
            ul.appendChild(item);
        });
    });

    document.getElementById('searchCourse').addEventListener('input', function() {
        var searchTerm = this.value.toLowerCase();
        var questionnaireRows = document.querySelectorAll('#questionnaireResults tr');
        var messageItems = document.querySelectorAll('#messages li');

        questionnaireRows.forEach(function(row) {
            var courseName = row.getAttribute('data-course').toLowerCase();
            if (courseName.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        messageItems.forEach(function(item) {
            var courseName = item.getAttribute('data-course').toLowerCase();
            if (courseName.includes(searchTerm)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
<?php
include __DIR__ . '/../footer.php';
?>