<?php
    // memulai interaksi (sessions)
    session_start();
 
    // include koneksi database
    include_once("./connect.php");
 
    // cek apakah ada kiriman data email
    // dan cek apakah ada kiriman data password
    if(isset($_POST['email']) && isset($_POST['password'])) {
        // simpan email ke dalam sebuah variabel
        $email = $_POST['email'];
        // simpan password ke dalam sebuah variable
        $password = $_POST['password'];
 
        // cek email ke dalam database
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $sql);
 
        // jika data ditemukan di database
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // cek kesesuaian password
            // antara $_POST["password"] dengan yang di database
            if(password_verify($password, $row['password'])) {
                // kalo berhasil login, dikasih SESSION["email"]
                $_SESSION['email'] = $email;
                // pindahin lokasi ke index.php
                header("Location: main.php");
                exit;
            } else {
                // password salah...
                echo "Password salah.";
            }
        } else {
            // email tidak ditemukan...
            echo "Email tidak ditemukan.";
        }
    }