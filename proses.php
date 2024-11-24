<?php
// process.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];

    // Validasi nama
    $name = $_POST['name'];
    if (strlen($name) < 3) {
        $errors[] = 'Nama harus lebih dari 2 karakter.';
    }

    // Validasi email
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email tidak valid.';
    }

    // Validasi telepon
    $phone = $_POST['phone'];
    if (!preg_match('/^\d{10,15}$/', $phone)) {
        $errors[] = 'Nomor telepon harus antara 10 hingga 15 digit.';
    }

    // Validasi pesan
    $message = $_POST['message'];
    if (strlen($message) < 10) {
        $errors[] = 'Pesan harus lebih dari 10 karakter.';
    }

    // Validasi file
    $file = $_FILES['file'];
    $fileTmpPath = $file['tmp_name'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    
    $allowedTypes = ['text/plain'];
    if ($fileSize > 2 * 1024 * 1024) {
        $errors[] = 'Ukuran file harus kurang dari 2MB.';
    }
    if (!in_array($fileType, $allowedTypes)) {
        $errors[] = 'Hanya file teks (.txt) yang diperbolehkan.';
    }

    // Jika ada error, tampilkan
    if (count($errors) > 0) {
        echo implode('<br>', $errors);
        exit;
    }

    // Baca isi file teks
    $fileContent = file_get_contents($fileTmpPath);

    // Simpan data ke sesi dan redirect ke result.php
    session_start();
    $_SESSION['formData'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'message' => $message,
        'fileContent' => nl2br($fileContent) // Konversi newline ke <br>
    ];
    header('Location: hasil.php');
    exit;
}
?>
