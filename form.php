<!-- form.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Pendaftaran</h1>
    <form action="proses.php" method="POST" enctype="multipart/form-data" id="registrationForm">
        <table>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="name" id="name" required minlength="3"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" id="email" required></td>
            </tr>
            <tr>
                <td>Telepon:</td>
                <td><input type="text" name="phone" id="phone" required pattern="^\d{10,15}$"></td>
            </tr>
            <tr>
                <td>Pesan:</td>
                <td><textarea name="message" id="message" required minlength="10"></textarea></td>
            </tr>
            <tr>
                <td>File Teks:</td>
                <td><input type="file" name="file" id="file" accept=".txt" required></td>
            </tr>
        </table>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>
