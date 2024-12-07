<!DOCTYPE html>
<html lang="nl-NL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursus Aanmaken &ndash; Docentenrecenties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Cursus Aanmaken</h2>
        <form id="createCourseForm">
            <div class="form-group">
                <label for="courseName">Cursusnaam</label>
                <input type="text" class="form-control" id="courseName" placeholder="Voer de naam van de cursus in" required>
            </div>
            <div class="form-group">
                <label for="courseDescription">Beschrijving</label>
                <textarea class="form-control" id="courseDescription" rows="4" placeholder="Voer een beschrijving van de cursus in" required></textarea>
            </div>
            <div class="form-group">
                <label for="courseDomain">Vakgebied</label>
                <input type="text" class="form-control" id="courseDomain" placeholder="Voer het vakgebied in" required>
            </div>
            <div class="form-group">
                <label for="studentName">Student Naam</label>
                <input type="text" class="form-control" id="studentName" placeholder="Voer de naam van de student in">
                <button type="button" class="btn btn-outline-success mt-2" onclick="addStudent()">Voeg student toe</button>
            </div>
            <div class="form-group">
                <label>Studentenlijst</label>
                <ul class="list-group" id="studentList"></ul>
            </div>
            <button type="submit" class="btn btn-success mt-3">Cursus Aanmaken</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function addStudent() {
            var studentName = document.getElementById('studentName').value;
            if (studentName) {
                var studentList = document.getElementById('studentList');
                var listItem = document.createElement('li');
                listItem.className = 'list-group-item';
                listItem.textContent = studentName;
                studentList.appendChild(listItem);
                document.getElementById('studentName').value = '';
            } else {
                alert('Voer een naam in om een student toe te voegen.');
            }
        }

        document.getElementById('createCourseForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Cursus succesvol aangemaakt!');
        });
    </script>
</body>
</html>