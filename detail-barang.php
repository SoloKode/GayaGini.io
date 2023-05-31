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
    $query = mysqli_query($connect, "SELECT * FROM databarang WHERE idbarang='$idbarang'");
    $result = mysqli_fetch_array($query);
?>

<html>
<head>
    <title>Detail Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h3>Gambar Barang</h3>
    
    <?php
        // Mencari jumlah foto dengan judul yang sama pada folder produk
        $judulFoto = $result['idbarang'];
        $fotoPath = "produk/" . $judulFoto . "*.png";
        $fotoFiles = glob($fotoPath);
        $jumlahFoto = count($fotoFiles);

        if ($jumlahFoto > 1) {
            // Tampilkan carousel jika terdapat lebih dari satu foto
    ?>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                        // Membuat indikator untuk setiap foto
                        for ($i = 0; $i < $jumlahFoto; $i++) {
                            echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"';
                            if ($i === 0) {
                                echo ' class="active"';
                            }
                            echo '></li>';
                        }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                        // Tampilkan setiap foto dalam carousel
                        foreach ($fotoFiles as $key => $fotoFile) {
                            echo '<div class="carousel-item';
                            if ($key === 0) {
                                echo ' active';
                            }
                            echo '">';
                            echo '<img src="' . $fotoFile . '" class="d-block w-100" alt="Gambar Barang">';
                            echo '</div>';
                        }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    <?php
        } elseif ($jumlahFoto === 1) {
            // Tampilkan gambar tunggal jika hanya terdapat satu foto
            $gambarPath = $fotoFiles[0];
            echo '<img src="' . $gambarPath . '" alt="Gambar Barang">';
        } else {
            // Tampilkan pesan jika tidak ada foto yang ditemukan
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
