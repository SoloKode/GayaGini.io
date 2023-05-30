<?php
    // Memeriksa apakah parameter kategori telah diterima
    if(isset($_GET['kategori'])){
        $kategori = $_GET['kategori'];
    }
    else {
        die ("Error. No Category Selected!");    
    }
    
    // Menghubungkan ke database
    include "connect.php"; // Gantikan dengan file koneksi yang sesuai dengan konfigurasi Anda

    // Mengambil data barang berdasarkan kategori
    $query = mysqli_query($connect, "SELECT * FROM databarang WHERE kategori='$kategori' LIMIT 9");

    // Mengecek jumlah barang yang ditemukan
    $rowCount = mysqli_num_rows($query);
?>
<html>
<head>
    <title>Daftar Barang</title>
    <style>
        .barang {
            display: inline-block;
            text-align: center;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h2>Daftar Barang - Kategori <?php echo $kategori; ?></h2>

    <?php
        // Memeriksa apakah ada barang yang ditemukan
        if ($rowCount > 0) {
            while ($result = mysqli_fetch_array($query)) {
                $idbarang = $result['idbarang'];
                $gambar = $idbarang . ".png";
                $gambarPath = "produk/" . $gambar;

                // Periksa apakah file gambar ada
                if (file_exists($gambarPath)) {
                    echo "<div class='barang'>";
                    echo "<img src='".$gambarPath."' alt='Gambar Barang'>";
                    echo "<h3>".$result['namabarang']."</h3>";
                    echo "<p>Harga: ".$result['hargabarang']."</p>";
                    echo "<a href='detail-barang.php?idbarang=".$idbarang."'>Detail</a>";
                    echo "</div>";
                } else {
                    echo "<div class='barang'>";
                    echo "<p>Gambar tidak ditemukan</p>";
                    echo "<h3>".$result['namabarang']."</h3>";
                    echo "<p>Harga: ".$result['hargabarang']."</p>";
                    echo "<a href='detail-barang.php?idbarang=".$idbarang."'>Detail</a>";
                    echo "</div>";
                }
            }
        } else {
            echo "<p>Tidak ada barang yang ditemukan dalam kategori ini.</p>";
        }
    ?>
</body>
</html>
