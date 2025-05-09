<?php
namespace App\Views;
include __DIR__ . '/../headeradmin.php';
$selectedUser = $_SESSION['selectedUser'];
?>
<h2>Profiel Bewerken</h2>
<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="firstName" class="form-label">Voornaam</label>
        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= htmlspecialchars($selectedUser->getFirstName()); ?>" required>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Achternaam</label>
        <input type="text" class="form-control" id="lastName" name="lastName" value="<?= htmlspecialchars($selectedUser->getLastName()); ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($selectedUser->getEmailAddress()); ?>" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Nieuw wachtwoord</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Profielfoto</label>
        <?php if ($selectedUser->getImage()): ?>
            <img src="<?= htmlspecialchars($selectedUser->getImage()); ?>" alt="Profielfoto" class="img-thumbnail mb-3" style="max-width: 150px;">
        <?php endif; ?>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>
    <?php if ($selectedUser instanceof \App\Models\Student): ?>
        <div class="mb-3">
            <label for="about" class="form-label">Over</label>
            <textarea class="form-control" id="about" name="about" rows="3"><?= htmlspecialchars($selectedUser->getAbout() ?? ''); ?></textarea>
        </div>
        <input type="hidden" name="type_user" value="student">
    <?php endif; ?>
    <input type="hidden" name="editUserId" value="<?= htmlspecialchars($selectedUser->getId()) ?>">
    <?php if ($selectedUser instanceof \App\Models\Teacher): ?>
        <input type="hidden" name="type_user" value="teacher">
    <?php endif; ?>
    <?php if ($selectedUser instanceof \App\Models\Admin): ?>
        <input type="hidden" name="type_user" value="admin">
    <?php endif; ?>
    <button type="submit" class="btn btn-success">Opslaan</button>
</form>
<form method="POST" class="mt-2">
    <input type="hidden" name="deleteUserId" value="<?= htmlspecialchars($selectedUser->getId()) ?>">
    <button type="submit" class="btn btn-danger">Verwijderen</button>
</form>
<?php
include __DIR__ . '/../footer.php';
?>