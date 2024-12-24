<?php
namespace App\Views;
include __DIR__ . '/../header.php';
?>
<div class="container mt-5">
    <h2>Berichten Plaatsen</h2>
    <form id="messageForm" enctype="multipart/form-data" class="mb-4">
        <div class="mb-3">
            <label for="course" class="form-label">Cursus</label>
            <select class="form-select" id="course" name="course" required>
                <?php 
                foreach ($_SESSION['listOfCources'] as $course): 
                ?>
                    <option value="<?= htmlspecialchars($course->getId()); ?>"><?= htmlspecialchars($course->getName()); ?></option>
                <?php 
                endforeach; 
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Onderwerp</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Bericht</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Foto</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
        </div>
        <button type="submit" onclick="postMessage();" class="btn btn-success">Plaatsen</button>
    </form>
    <h3>Berichten</h3>
    <ul id="messages" class="list-group"></ul>
</div>
<script>
    function postMessage() {
        const fileInput = document.getElementById('photo');
        const file = fileInput.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onloadend = function() {
                const base64String = reader.result.replace("data:", "").replace(/^.+,/, "");

                let message = { 
                    course: document.getElementById('course').value,
                    subject: document.getElementById('subject').value,
                    message: document.getElementById('message').value,
                    photo: base64String
                };

                fetch('/api/massageboard', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(message)
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    loadMessages();
                })
                .catch(error => console.log(error));
            };

            reader.readAsDataURL(file);
        } else {
            let message = { 
                course: document.getElementById('course').value,
                subject: document.getElementById('subject').value,
                message: document.getElementById('message').value
            };

            fetch('/api/massageboard', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(message)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                loadMessages();
            })
            .catch(error => console.log(error));
        };

        reader.readAsDataURL(file);
    }

    function loadMassages() {
        fetch('/api/massageboard')
            .then(result => result.json())
            .then(data => {
                console.log(data);
                const messageContainer = document.getElementById('messages');

            data.reverse().forEach(element => {
                const listItem = document.createElement("li");
                listItem.className = "list-group-item";

                const courseName = document.createElement("strong");
                courseName.innerText = element.courseId;
                listItem.appendChild(courseName);

                const subject = document.createElement("strong");
                subject.innerText = element.description;
                listItem.appendChild(subject);

                const content = document.createElement("p");
                content.innerText = element.content;
                listItem.appendChild(content);

                if (element.image) {
                    console.log('Image found:', element.image);
                    const photo = document.createElement("img");
                    photo.src = element.image;
                    photo.alt = "Foto";
                    photo.className = "img-fluid mt-2";
                    listItem.appendChild(photo);
                }

                const timestamp = document.createElement("span");
                timestamp.className = "badge bg-secondary float-end";
                timestamp.innerText = element.dateTime;
                listItem.appendChild(timestamp);

                messageContainer.appendChild(listItem);
            });
        })
        .catch(error => console.log(error));
    }

    loadMassages();
</script>
<?php
include __DIR__ . '/../footer.php';
?>