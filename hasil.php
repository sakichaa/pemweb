<?php
// result.php
session_start();
if (!isset($_SESSION['formData'])) {
    echo "Data tidak ditemukan.";
    exit;
}

$formData = $_SESSION['formData'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Hasil Pendaftaran</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <td><?= htmlspecialchars($formData['name']) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($formData['email']) ?></td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td><?= htmlspecialchars($formData['phone']) ?></td>
        </tr>
        <tr>
            <th>Pesan</th>
            <td><?= nl2br(htmlspecialchars($formData['message'])) ?></td>
        </tr>
        <tr>
            <th>Isi File Teks</th>
            <td><?= $formData['fileContent'] ?></td>
        </tr>
    </table>
</body>
</html>
