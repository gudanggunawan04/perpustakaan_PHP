<?php
include_once("./connect.php");

$message = "";

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];

    $query = mysqli_query($db, "INSERT INTO staf (nama, telp, email) VALUES ('$nama', '$telp', '$email')");
    if ($query) {

        $max_id_query = mysqli_query($db, "SELECT MAX(id) FROM staf");
        $max_id_result = mysqli_fetch_array($max_id_query);
        $max_id = $max_id_result[0];

        // Setel ulang auto-increment tabel staff ke nilai maksimum ditambah 1
        mysqli_query($db, "ALTER TABLE staf AUTO_INCREMENT = " . ($max_id + 1));

        $message = "Data staf berhasil ditambahkan.";
        // JavaScript untuk menampilkan pop up
        echo '<script>alert("'.$message.'");</script>';
    } else {
        $message = "Gagal menambahkan data staf.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Staff</title>
</head>

<body>
    <h1>Tambah Data Staff Perpustakaan</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="telp">Telepon:</label><br>
        <input type="text" id="telp" name="telp" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit" name="submit">Tambah Staff</button>
    </form>
    <br>
    <a href="./staff.php">Kembali ke halaman data staff</a>
</body>

</html>