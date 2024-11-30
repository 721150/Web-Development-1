<!DOCTYPE html>
<html lang="nl-NL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel &ndash; Docentenrecenties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h2>Profiel</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img id="profile-photo" src="https://via.placeholder.com/150" class="rounded-circle img-fluid" alt="Profiel Foto">
                    </div>
                    <div class="col-md-8">
                        <h3 id="profile-fullname">Naam: Jan Jansen</h3>
                        <p><strong>Voornaam:</strong> <span id="profile-firstname">Jan</span></p>
                        <p><strong>Achternaam:</strong> <span id="profile-lastname">Jansen</span></p>
                        <p><strong>E-mailadres:</strong> <span id="profile-email">jan.jansen@example.com</span></p>
                        <p><strong>Wachtwoord:</strong> <span id="profile-password">******************</span></p>
                        <p><strong>Over mij:</strong> <span id="profile-about">Een beetje informatie</span></p>
                        <button class="btn btn-success mt-3" data-toggle="modal" data-target="#editProfileModal">Bewerk Profiel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Bewerk Profiel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="form-group">
                            <label for="firstname">Voornaam</label>
                            <input type="text" class="form-control" id="firstname" value="Jan">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Achternaam</label>
                            <input type="text" class="form-control" id="lastname" value="Jansen">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mailadres</label>
                            <input type="email" class="form-control" id="email" value="jan.jansen@example.com">
                        </div>
                        <div class="form-group">
                            <label for="password">Wachtwoord</label>
                            <input type="password" class="form-control" id="password" value="******************">
                        </div>
                        <div class="form-group">
                            <label for="about">Over mij</label>
                            <input type="text" class="form-control" id="about" value="Een beetje informatie">
                        </div>
                        <div class="form-group">
                            <label for="photo">Profielfoto</label>
                            <input type="file" class="form-control-file" id="photo" accept="image/*">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Sluiten</button>
                    <button type="button" class="btn btn-success" onclick="saveProfile()">Opslaan</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function saveProfile() {
            // Haal de waarden op uit het formulier
            var firstname = document.getElementById('firstname').value;
            var lastname = document.getElementById('lastname').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var about = document.getElementById('about').value;
            var photo = document.getElementById('photo').files[0];

            // Update de profielgegevens op de pagina
            document.getElementById('profile-fullname').innerText = 'Naam: ' + firstname + ' ' + lastname;
            document.getElementById('profile-firstname').innerText = firstname;
            document.getElementById('profile-lastname').innerText = lastname;
            document.getElementById('profile-email').innerText = email;
            document.getElementById('profile-about').innerText = about;
            document.getElementById('profile-password').innerText = password;

            // Update de profielfoto als er een nieuwe foto is geselecteerd
            if (photo) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-photo').src = e.target.result;
                }
                reader.readAsDataURL(photo);
            }

            // Sluit het modaal venster
            $('#editProfileModal').modal('hide');
        }
    </script>
</body>
</html>