<?php
include "connect.php";
// Mengambil data yang dikirim melalui POST
$usernames = $_POST['username'];
$emails = $_POST['email'];
$newpasswords = $_POST['newpassword'];

// Proses pengecekan login di sini
$connect = new mysqli($host, $username, $password, $database);
if ($connect->connect_error) {
    die("Koneksi ke database gagal: " . $connect->connect_error);
}

// Mengecek data login pada tabel 'user'
$sql = "SELECT * FROM user WHERE username = '$usernames'";
$result = $connect->query($sql);
$sql = "SELECT * FROM user WHERE email = '$emails'";
$resulta = $connect->query($sql);

if ($result->num_rows > 0 && $resulta->num_rows > 0 && strlen($newpasswords) >= 8) {
        $sql = "UPDATE user SET password = '".$newpasswords."' WHERE username = '$usernames' AND email = '$emails'";
        $connect->query($sql);
        $response = array(
            'success' => true,
            'message' => 'Ubah Kata Sandi Berhasil berhasil'
        );
    }
 else if(strlen($newpasswords) < 8){
    // Jika tidak ditemukan pengguna dengan nama pengguna yang diberikan
    $response = array(
        'success' => false,
        'message' => 'Password Minimal 8 Digit'
    );
}else {
    // Jika tidak ditemukan pengguna dengan nama pengguna yang diberikan
    $response = array(
        'success' => false,
        'message' => 'Username tidak terdaftar'
    );
}

// Menutup koneksi ke database
$connect->close();

// Mengirim respons dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>