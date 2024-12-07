<!DOCTYPE html>
<html lang="nl-NL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruikersbeheer &ndash; Docentenrecenties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gebruikersbeheer</h1>
        <table class="table table-bordered" id="userTable">
            <thead class="thead-dark">
                <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <!-- Gebruikers worden hier toegevoegd -->
            </tbody>
        </table>
        <h2 class="mt-4">Gebruiker toevoegen</h2>
        <form id="userForm" class="mb-4">
            <div class="mb-3">
                <label for="name" class="form-label">Naam:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-success">Toevoegen</button>
        </form>
    </div>

    <script>
        let users = [];

        document.getElementById('userForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            addUser(name, email);
        });

        function addUser(name, email) {
            const user = { name, email };
            users.push(user);
            renderTable();
        }

        function editUser(index) {
            const name = prompt("Nieuwe naam:", users[index].name);
            const email = prompt("Nieuwe email:", users[index].email);
            if (name && email) {
                users[index] = { name, email };
                renderTable();
            }
        }

        function deleteUser(index) {
            users.splice(index, 1);
            renderTable();
        }

        function renderTable() {
            const tbody = document.querySelector('#userTable tbody');
            tbody.innerHTML = '';
            users.forEach((user, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editUser(${index})">Bewerken</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteUser(${index})">Verwijderen</button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>