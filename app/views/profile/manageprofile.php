<?php
namespace App\Views;
include __DIR__ . '/../header.php';
?>
<h2>Profiel Bewerken</h2>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="firstName" class="form-label">Voornaam</label>
        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= htmlspecialchars($_SESSION['student']->getFirstName()); ?>" required>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Achternaam</label>
        <input type="text" class="form-control" id="lastName" name="lastName" value="<?= htmlspecialchars($_SESSION['student']->getLastName()); ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($_SESSION['student']->getEmailAddress()); ?>" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Wachtwoord</label>
        <input type="password" class="form-control" id="password" name="password" value="<?= htmlspecialchars($_SESSION['student']->getPassword()); ?>" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Profielfoto</label>
            <?php if ($_SESSION['student']->getImage()): ?>
                <img src="<?= htmlspecialchars($_SESSION['student']->getImage()); ?>" alt="Profielfoto" class="img-thumbnail mb-3" style="max-width: 150px;">
            <?php endif; ?>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="mb-3">
        <label for="about" class="form-label">Over</label>
        <textarea class="form-control" id="about" name="about" rows="3"><?= htmlspecialchars($_SESSION['student']->getAbout()); ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Opslaan</button>
    <a href="/ManageProfile/deleteProfile" class="btn btn-danger">Verwijderen</a>
</form>
<?php
include __DIR__ . '/../footer.php';
?>