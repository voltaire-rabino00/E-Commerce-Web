        // When the button is clicked, open the file picker
        document.getElementById('triggerProfileUpload').addEventListener('click', function() {
            document.getElementById('profileImgInput').click();
        });
        // When a file is selected, show the submit button
        document.getElementById('profileImgInput').addEventListener('change', function() {
            document.getElementById('submitProfileBtn').style.display = 'inline-block';
            document.getElementById('submitProfileBtn').textContent = 'Save';
            document.getElementById('submitProfileBtn').className = 'btn btn-success mt-2';
        });