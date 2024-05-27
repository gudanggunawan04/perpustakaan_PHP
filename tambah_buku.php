<?php
include_once("./connect.php");

$message = "";

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $isbn = $_POST["isbn"];
    $unit = $_POST["unit"];

    $query = mysqli_query($db, "INSERT INTO buku (nama, isbn, unit) VALUES ('$nama', '$isbn', '$unit')");
    if ($query) {

        $max_id_query = mysqli_query($db, "SELECT MAX(id) FROM buku");
        $max_id_result = mysqli_fetch_array($max_id_query);
        $max_id = $max_id_result[0];

        mysqli_query($db, "ALTER TABLE buku AUTO_INCREMENT = " . ($max_id + 1));

        $message = "Data buku berhasil ditambahkan.";
        // JavaScript untuk menampilkan pop up
        echo '<script>alert("'.$message.'");</script>';
    } else {
        $message = "Gagal menambahkan data buku.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Buku</title>
 
</head>

<body>
    <h1>Form Tambah Data Buku</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn" required><br><br>

        <label for="unit">Unit:</label><br>
        <input type="number" id="unit" name="unit" required><br><br>

        <button type="submit" name="submit">Tambah Buku</button>
    </form>
    <br>
    <a href="./buku.php">Kembali ke halaman data buku</a>
</body>

</html>