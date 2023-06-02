<?php
// Mengambil data dari form
$usernames = $_POST['username'];
$emails = $_POST['email'];
$passwords = $_POST['password'];
$konfirmpw = $_POST['confirmPassword'];
// Koneksi ke database MySQL
include "connect.php";

// Memeriksa koneksi
if ($connect->connect_error) {
    die("Koneksi ke database gagal: " . $connect->connect_error);
}
if (($passwords == $konfirmpw)&&(strlen($emails) > 0)&&(strlen($usernames) > 0)&&(strlen($passwords) >= 8)) {
    $checkQuery = "SELECT * FROM user WHERE username = '$usernames' OR email = '$emails'";
    $checkResult = $connect->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        $response = array(
            "success" => false,
            "message" => "Username atau email sudah digunakan."
        );
    }
    else if ($checkResult->num_rows > 0 && strlen($passwords) < 8) {
        # code...
                if (strlen($passwords) < 8) {
                    $response = array(
                        "success" => false,
                        "message" => "Password kurang dari 8 digit."
                    );
                }
                else if ($passwords !== $konfirmpw) {
                    # code...
                    $response = array(
                        "success" => false,
                        "message" => "Konfirmasi password tidak sama.");
                }
            } 
            else {
                // Menyimpan data pendaftar ke dalam tabel 'user'
                $sql = "INSERT INTO user (username, email, password) VALUES ('$usernames', '$emails', '$passwords')";
        
                if ($connect->query($sql) === TRUE) {
                    $response = array(
                        "success" => true,
                        "message" => "Pendaftaran berhasil"
                    );
                } else {
                    $response = array(
                        "success" => false,
                        "message" => "Error: " . $sql . "<br>" . $connect->error
                    );
                }
            }
    } 
else {
    $response = array(
        "success" => false,
        "message" => "Syarat Tidak Terpenuhi."
    );
}
// Memeriksa apakah username atau email sudah ada dalam tabel


// Mengirim respon dalam format JSON
header("Content-type: application/json");
echo json_encode($response);
$connect->close();
?>
