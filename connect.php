<?php
    // Informasi koneksi database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "databarang";

    // Membuat koneksi ke database
    $connect = mysqli_connect($host, $username, $password, $database);

    // Memeriksa apakah koneksi berhasil terbentuk
    if (!$connect) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }
?>