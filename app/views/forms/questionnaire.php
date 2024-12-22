<?php
namespace App\Views;
include __DIR__ . '/../header.php';
?>
<div class="content flex-grow-1 p-4 overflow-auto">
    <h2>Evaluatie Vragenlijst</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="course" class="form-label">Vak</label>
            <input type="hidden" name="courseId" value="<?= htmlspecialchars($selectedCourse->getId()); ?>">
            <input type="text" class="form-control" id="course" name="course" value="<?= htmlspecialchars($selectedCourse->getName()); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="overallQuality" class="form-label">Hoe beoordeel je de algehele kwaliteit van de lessen?</label>
            <select class="form-select" id="overallQuality" name="overallQuality">
                <option value="1">Zeer slecht</option>
                <option value="2">Slecht</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Goed</option>
                <option value="5">Zeer goed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="teacherSatisfaction" class="form-label">Hoe tevreden ben je met de docent?</label>
            <select class="form-select" id="teacherSatisfaction" name="teacherSatisfaction">
                <option value="1">Zeer ontevreden</option>
                <option value="2">Ontevreden</option>
                <option value="3">Neutraal</option>
                <option value="4">Tevreden</option>
                <option value="5">Zeer tevreden</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="teacherClarity" class="form-label">Hoe duidelijk is de uitleg van de docent?</label>
            <select class="form-select" id="teacherClarity" name="teacherClarity">
                <option value="1">Zeer onduidelijk</option>
                <option value="2">Onduidelijk</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Duidelijk</option>
                <option value="5">Zeer duidelijk</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="teacherResponse" class="form-label">Hoe goed beantwoordt de docent vragen van studenten?</label>
            <select class="form-select" id="teacherResponse" name="teacherResponse">
                <option value="1">Zeer slecht</option>
                <option value="2">Slecht</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Goed</option>
                <option value="5">Zeer goed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="teacherAccessibility" class="form-label">Hoe toegankelijk is de docent buiten de lesuren?</label>
            <select class="form-select" id="teacherAccessibility" name="teacherAccessibility">
                <option value="1">Zeer ontoegankelijk</option>
                <option value="2">Ontoegankelijk</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Toegankelijk</option>
                <option value="5">Zeer toegankelijk</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="teacherMotivation" class="form-label">Hoe goed motiveert de docent de studenten?</label>
            <select class="form-select" id="teacherMotivation" name="teacherMotivation">
                <option value="1">Zeer slecht</option>
                <option value="2">Slecht</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Goed</option>
                <option value="5">Zeer goed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="lessonRelevance" class="form-label">Hoe relevant vind je de lesinhoud?</label>
            <select class="form-select" id="lessonRelevance" name="lessonRelevance">
                <option value="1">Zeer irrelevant</option>
                <option value="2">Irrelevant</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Relevant</option>
                <option value="5">Zeer relevant</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="lessonGoals" class="form-label">Hoe goed sluit de lesinhoud aan bij de leerdoelen?</label>
            <select class="form-select" id="lessonGoals" name="lessonGoals">
                <option value="1">Zeer slecht</option>
                <option value="2">Slecht</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Goed</option>
                <option value="5">Zeer goed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="lessonChallenge" class="form-label">Hoe uitdagend vind je de lesinhoud?</label>
            <select class="form-select" id="lessonChallenge" name="lessonChallenge">
                <option value="1">Zeer eenvoudig</option>
                <option value="2">Eenvoudig</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Uitdagend</option>
                <option value="5">Zeer uitdagend</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="lessonInteractivity" class="form-label">Hoe interactief zijn de lessen?</label>
            <select class="form-select" id="lessonInteractivity" name="lessonInteractivity">
                <option value="1">Zeer niet interactief</option>
                <option value="2">Niet interactief</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Interactief</option>
                <option value="5">Zeer interactief</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="teacherEngagement" class="form-label">Hoe goed betrekt de docent de studenten bij de les?</label>
            <select class="form-select" id="teacherEngagement" name="teacherEngagement">
                <option value="1">Zeer slecht</option>
                <option value="2">Slecht</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Goed</option>
                <option value="5">Zeer goed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="learningMaterials" class="form-label">Hoe beoordeel je de gebruikte leermiddelen (boeken, presentaties, etc.)?</label>
            <select class="form-select" id="learningMaterials" name="learningMaterials">
                <option value="1">Zeer slecht</option>
                <option value="2">Slecht</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Goed</option>
                <option value="5">Zeer goed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="lessonOrganization" class="form-label">Hoe goed is de planning en organisatie van de lessen?</label>
            <select class="form-select" id="lessonOrganization" name="lessonOrganization">
                <option value="1">Zeer slecht</option>
                <option value="2">Slecht</option>
                <option value="3">Gemiddeld</option>
                <option value="4">Goed</option>
                <option value="5">Zeer goed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Verzenden</button>
    </form>
</div>
<?php
include __DIR__ . '/../footer.php';
?>