<?php
    // Memeriksa apakah parameter idbarang telah diterima
    if(isset($_GET['id'])){
        $idbarang = $_GET['id'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    
    // Menghubungkan ke database
    include "connect.php"; // Gantikan dengan file koneksi yang sesuai dengan konfigurasi Anda

    // Mengambil data barang berdasarkan idbarang
    $query = mysqli_query($connect, "SELECT * FROM barang WHERE idbarang='$idbarang'");
    $result = mysqli_fetch_array($query);
?>
<html>
<head>
    <title>Detail Barang</title>
</head>
<body>
    <h3>Gambar Barang</h3>
    <?php
        $gambar = $result['idbarang'] . ".png"; // Nama file gambar adalah idbarang.png
        $gambarPath = "produk/" . $gambar; // Jalur ke folder produk dengan nama file gambar

        // Periksa apakah file gambar ada
        if (file_exists($gambarPath)) {
            echo "<img src='".$gambarPath."' alt='Gambar Barang'>";
        } else {
            echo "Gambar tidak ditemukan.";
        }
    ?>
    <h2>Detail Data Barang</h2>
    <p><i>Note: Berikut adalah detail informasi barang berdasarkan ID: <b><?php echo $idbarang?></b></i></p>
    <table border="0" cellpadding="4">
        <tr>
            <td>Nama Barang</td>
            <td>: <?php echo $result['namabarang']?></td>
        </tr>
        <tr>
            <td>Harga Barang</td>
            <td>: <?php echo $result['hargabarang']?></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>: <?php echo $result['kategori']?></td>
        </tr>
    </table>
</body>
</html>
