<?php
include "connect.php";

// Mengambil data yang dikirim melalui POST
$uid = $_POST['useridz'];
$usernames = $_POST['usernamez'];
$total = $_POST['totalz'];

$connect = new mysqli($host, $username, $password, $database);
if ($connect->connect_error) {
    die("Koneksi ke database gagal: " . $connect->connect_error);
}

// Mengecek apakah data checkout sudah ada berdasarkan userid
$query = "SELECT * FROM checkout WHERE userid = '$uid'";
$result = $connect->query($query);

if ($result->num_rows > 0) {
    // Jika data sudah ada, lakukan operasi update
    $sql = "UPDATE checkout SET username='$usernames', total='$total' WHERE userid='$uid'";

    if ($connect->query($sql) === TRUE && $total > 0) {
        $response = array('success' => true, 'message' => 'Data Checkout berhasil diupdate');
    } else if ($total == 0) {
        $response = array('success' => false, 'message' => 'Lu beli apa anjir kok 0');
    } else {
        $response = array('success' => false, 'message' => 'Error: ' . $sql . '<br>' . mysqli_error($connect));
    }
} else {
    // Jika data belum ada, lakukan operasi insert
    $sql = "INSERT INTO checkout (userid, username, total) VALUES ('$uid', '$usernames', '$total')";

    if ($connect->query($sql) === TRUE && $total > 0) {
        $response = array('success' => true, 'message' => 'Data Checkout berhasil ditambahkan');
    } else if ($total == 0) {
        $response = array('success' => false, 'message' => 'Lu beli apa anjir kok 0');
    } else {
        $response = array('success' => false, 'message' => 'Error: ' . $sql . '<br>' . mysqli_error($connect));
    }
}

// Menutup koneksi ke database
$connect->close();

// Mengirim respons dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
