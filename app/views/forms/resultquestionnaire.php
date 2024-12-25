<?php
namespace App\Views;
include __DIR__ . '/../header.php';
?>
<div class="content flex-grow-1 p-4 overflow-auto">
    <h2>Gemiddelde Evaluatie Scores</h2>
    <div class="mb-4">
        <?php if (isset($_SESSION['resultCource']) && !empty($_SESSION['resultCource'])): ?>
            <?php foreach ($_SESSION['resultCource'] as $result): ?>
                <h5>Cursus: <?= htmlspecialchars($result['name']); ?></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Vraag</th>
                            <th>Gemiddelde Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Hoe beoordeel je de algehele kwaliteit van de lessen?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_one'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe tevreden ben je met de docent?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_two'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe duidelijk is de uitleg van de docent?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_three'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe goed beantwoordt de docent vragen van studenten?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_four'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe toegankelijk is de docent buiten de lesuren?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_five'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe goed motiveert de docent de studenten?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_six'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe relevant vind je de lesinhoud?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_seven'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe goed sluit de lesinhoud aan bij de leerdoelen?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_eight'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe uitdagend vind je de lesinhoud?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_nine'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe interactief zijn de lessen?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_ten'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe goed betrekt de docent de studenten bij de les?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_eleven'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe beoordeel je de gebruikte leermiddelen (boeken, presentaties, etc.)?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_twelve'], 2)); ?></td>
                        </tr>
                        <tr>
                            <td>Hoe goed is de planning en organisatie van de lessen?</td>
                            <td><?= htmlspecialchars(number_format($result['avg_answer_thirteen'], 2)); ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Geen resultaten gevonden.</p>
        <?php endif; ?>
    </div>
</div>
<?php
include __DIR__ . '/../footer.php';
?>