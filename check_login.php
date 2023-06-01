<?php
include "connect.php";
// Mengambil data yang dikirim melalui POST
$usernames = $_POST['username'];
$passwords = $_POST['password'];

// Proses pengecekan login di sini
$connect = new mysqli($host, $username, $password, $database);
if ($connect->connect_error) {
    die("Koneksi ke database gagal: " . $connect->connect_error);
}
// Mengecek data login pada tabel 'user'
$sql = "SELECT * FROM user WHERE username = '$usernames'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedpassword = password_hash($row['password'], PASSWORD_DEFAULT);
    // Memeriksa kecocokan kata sandi
    if (password_verify($passwords, $hashedpassword)) {
        // Jika cocok, login berhasil
        session_start();
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['username'] = $usernames;
        $_SESSION['logged_in'] = true;
        $response = array(
            'success' => true,
            'message' => 'Login berhasil',
            'redirect' => 'index.php'
        );
        
        // Login berhasil, simpan data login ke dalam session
        // Redirect ke halaman beranda atau halaman lainnya
        
    } else {
        // Jika tidak cocok, login gagal
        $response = array(
            'success' => false,
            'message' => 'Username atau kata sandi salah'
        );
    }
} else {
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
