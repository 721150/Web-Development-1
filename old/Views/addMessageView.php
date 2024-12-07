<!DOCTYPE html>
<html lang="nl-NL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursus Beoordeling</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Beoordeel de Cursus</h1>
        <form>
            <div class="mb-3">
                <label for="cursus" class="form-label">Cursus</label>
                <input type="text" class="form-control" id="cursus" placeholder="Naam van de cursus">
            </div>
            <div class="mb-3">
                <label for="beoordeling" class="form-label">Beoordeling</label>
                <select class="form-select" id="beoordeling">
                    <option value="1">1 - Zeer slecht</option>
                    <option value="2">2 - Slecht</option>
                    <option value="3">3 - Gemiddeld</option>
                    <option value="4">4 - Goed</option>
                    <option value="5">5 - Uitstekend</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="opmerkingen" class="form-label">Opmerkingen</label>
                <textarea class="form-control" id="opmerkingen" rows="3" placeholder="Uw opmerkingen"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Verzenden</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>