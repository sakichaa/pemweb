// script.js
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    let valid = true;
    
    // Validasi nama
    const name = document.getElementById('name').value;
    if (name.length < 3) {
        alert('Nama harus lebih dari 2 karakter.');
        valid = false;
    }
    
    // Validasi file
    const fileInput = document.getElementById('file');
    const file = fileInput.files[0];
    if (file) {
        const fileSize = file.size / 1024 / 1024; // MB
        const allowedTypes = ['text/plain'];
        if (fileSize > 2) {
            alert('Ukuran file harus kurang dari 2MB.');
            valid = false;
        }
        if (!allowedTypes.includes(file.type)) {
            alert('Hanya file teks (.txt) yang diperbolehkan.');
            valid = false;
        }
    } else {
        alert('File harus diupload.');
        valid = false;
    }

    if (!valid) {
        event.preventDefault();
    }
});
