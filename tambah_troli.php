<?php
include "connect.php";
// Mengambil data yang dikirim melalui POST
$uid = $_POST['useridss'];
$idbarangs = $_POST['idbarangss'];
$usernames = $_POST['usernamess'];
$namabarangs = $_POST['namabarangss'];
$hargabarangs = $_POST['hargabarangss'];
$ukurans = $_POST['ukuranTerpilih'];
$warnas = $_POST['warnaTerpilih'];
$kuantitas = $_POST['kuantitas'];

$connect = new mysqli($host, $username, $password, $database);
if ($connect->connect_error) {
    die("Koneksi ke database gagal: " . $connect->connect_error);
}
// Mengecek data login pada tabel 'user'
$sql = "INSERT INTO rekamtroliuser (userid, idbarang, username, namabarang, hargabarang, ukuran, warna, kuantitas) VALUES ('$uid', '$idbarangs', '$usernames', '$namabarangs', '$hargabarangs', '$ukurans', '$warnas','$kuantitas')";

if ($connect->query($sql) === TRUE) {
    $response = array('success' => true, 'message' => 'Barang berhasil ditambahkan ke troli.');
} else {
    $response = array('success' => false, 'message' => 'Error: ' . $sql . '<br>' . mysqli_error($connect));
}

// Menutup koneksi ke database
$connect->close();

// Mengirim respons dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>