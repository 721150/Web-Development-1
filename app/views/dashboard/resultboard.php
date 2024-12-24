<?php
namespace App\Views;
include __DIR__ . '/../header.php';
?>
<div class="mb-4">
    <h2>Resultaten van de Vragenlijsten</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Vragenlijst</th>
                <th>Gemiddelde Score</th>
                <th>Actie</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['results'] as $questionnaire): ?>
            <tr>
                <td><?= htmlspecialchars($questionnaire['name']); ?></td>
                <td><?= htmlspecialchars($questionnaire['score']); ?></td>
                <td><a href="/" class="btn btn-success">Open Vragenlijst</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div>
    <h2>Geplaatste Berichten</h2>
    <ul id="messages" class="list-group">
        <?php foreach (array_reverse($_SESSION['messages']) as $message): ?>
            <li class="list-group-item">
                <strong><?= htmlspecialchars($message->getCourseId()); ?></strong> - <?= htmlspecialchars($message->getDescription()); ?>
                <p><?= htmlspecialchars($message->getContent()); ?></p>
                <?php if (!empty($message->getImageString())): ?>
                    <img src="<?= htmlspecialchars($message->getImage()); ?>" alt="Foto" class="img-fluid mt-2">
                <?php endif; ?>
                <span class="badge bg-secondary float-end"><?= htmlspecialchars($message->getDateTime()); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php
include __DIR__ . '/../footer.php';
?>