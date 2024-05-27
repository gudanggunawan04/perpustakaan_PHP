<?php
include_once("./connect.php");
$query = mysqli_query($db, "SELECT * FROM staf");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Staff</title>
</head>

    <body>
        <h1>Daftar Staff Perpustakaan</h1>  

        <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $staff): ?>
            <tr>
                <td><?php echo $staff["id"]; ?></td>
                <td><?php echo $staff["nama"]; ?></td>
                <td><?php echo $staff["telp"]; ?></td>
                <td><?php echo $staff["email"]; ?></td>
                <td>
                    <a href="./edit_staff.php?id=<?php echo $staff['id']; ?>">Edit</a>
                    /
                    <a href="./hapus_staff.php?id=<?php echo $staff['id']; ?>"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus staff ini?')">Hapus</a>
                    <!-- notif menghapus staff dengan konfirmasi -->
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <a href="./tambah_Staff.php">Tambah data staff</a>
    <br>
    <a href="./main.php">Kembali ke halaman utama</a>
    </body>
    </html>