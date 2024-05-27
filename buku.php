<?php
include_once("./connect.php");
$query = mysqli_query($db, "SELECT * FROM buku");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    
</head>

    <body>
    <h1>Daftar Buku Perpustakaan</h1>
        
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>ISBN</th>
                <th>Unit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $buku): ?>
            <tr>
                <td><?php echo $buku["id"]; ?></td>
                <td><?php echo $buku["nama"]; ?></td>
                <td><?php echo $buku["isbn"]; ?></td>
                <td><?php echo $buku["unit"]; ?></td>
                <td>
                    <a href="./edit_buku.php?id=<?php echo $buku['id']; ?>">Edit</a>
                    \ <a href="./hapus_buku.php?id=<?php echo $buku['id']; ?>"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</a>
                   
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <br>
 
    </table>
    <br>
    <br>
    <a href="./tambah_buku.php">Tambah data buku</a><br>
    <a href="./main.php">Kembali ke halaman utama</a>
    </body>
</html>