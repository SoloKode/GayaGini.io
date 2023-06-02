<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userid = $_POST["userid"];
    $idbarang = $_POST["idbarang"];
    include 'connect.php';
    // Lakukan koneksi ke database dan jalankan query untuk menghapus data troli
    $connect = new mysqli($host, $username, $password, $database);
    if ($connect->connect_error) {
        die("Koneksi ke database gagal: " . $connect->connect_error);
    }

    $query = "DELETE FROM rekamtroliuser WHERE userid = $userid AND idbarang = '$idbarang'";
    $result = $connect->query($query);

    // Tutup koneksi ke database
    $connect->close();

    // Kirim respon sukses
    echo "success";
}
?>
