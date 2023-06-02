<?php 
    include 'connect.php';
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
       
    }
    else {
        $userid = $_SESSION['userid'];
        $pengguna = $_SESSION['username'];
     ;?>
        <script>
        var userid = "<?php echo $userid; ?>";
        </script>

     <?php
    }
?>
<?php
    // Memeriksa apakah parameter idbarang telah diterima
    if(isset($_GET['id'])){
        $idbarang = $_GET['id'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    
    // Menghubungkan ke database
     // Gantikan dengan file koneksi yang sesuai dengan konfigurasi Anda

    // Mengambil data barang berdasarkan idbarang
    $query = mysqli_query($connect, "SELECT * FROM databarang WHERE idbarang='$idbarang'");
    $result = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GayaGini - <?php echo $result['namabarang']?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="GAYAGINI Fashion Shop" name="keywords">
    <meta content="Online Shop Pilihan Anak Muda" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid row align-items-center py-3 px-xl-5 mt-3 ">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <img class="ml-5" src="img/pht/Gaya-Gini.png" alt="" width="102,4" height="60">
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form>
                <div class="ml-4 input-group">
                    <input id="search-input" type="text" class="form-control" placeholder="Cari Produk">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <a id="search-button" class="text-primary"><i class="fa fa-search"></i></a>
                        </span>
                    </div>
                </div>
            </form>
        </div>

<script>
    document.getElementById('search-button').addEventListener('click', function(event) {
        event.preventDefault();
        
        var searchInput = document.getElementById('search-input').value;
        var url = 'shop.php?namabarang=' + encodeURIComponent(searchInput);
        window.location.href = url;
    });
</script>
        <?php
            // Lakukan koneksi ke database

            // Periksa apakah pengguna telah login dan dapatkan userid
            if (isset($_SESSION['userid'])) {
                $userid = $_SESSION['userid'];

                // Query untuk mengambil data dari tabel datapengguna
                $queryss = "SELECT kuantitas FROM rekamtroliuser WHERE userid = $userid";
                $resultss = $connect->query($queryss);

                if ($resultss->num_rows > 0) {
                    $troli_count = 0;
                    while ($row = $resultss->fetch_assoc()) {
                        $kuantitas = $row['kuantitas'];
                        $troli_count += $kuantitas;
                    }
                } else {
                    // Jika data tidak ditemukan, set jumlah barang yang dipilih menjadi 0
                    $troli_count = 0;
                }
                
            } else {
                // Jika pengguna belum login, set jumlah barang yang dipilih dan jumlah barang yang disukai menjadi 0
                $troli_count = 0;
            }
            ?>

            <div class="col-lg-3 col-6 text-right">
                <a href="cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?php echo $troli_count; ?> Produk</span>
                </a>
            </div>
    </div>
</div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0 text-light font-weight-semi-bold">Kategori</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Kaos<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute border-0 rounded-0 w-100 m-0">
                                <a href="shop.php?kategori=Kaos Pria" class="dropdown-item">Kaos Pria</a>
                                <a href="shop.php?kategori=Kaos Wanita" class="dropdown-item">Kaos Wanita</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Kemeja<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute border-0 rounded-0 w-100 m-0">
                                <a href="shop.php?kategori=Kemeja Pria" class="dropdown-item">Kemeja Pria</a>
                                <a href="shop.php?kategori=Kemeja Wanita" class="dropdown-item">Kemeja Wanita</a>
                            </div>
                        </div>
                        <a href="shop.php?kategori=Hoodie" class="nav-item nav-link">Hoodie</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Sepatu<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute border-0 rounded-0 w-100 m-0">
                                <a href="shop.php?kategori=Sepatu Pria" class="dropdown-item">Sepatu Pria</a>
                                <a href="shop.php?kategori=Sepatu Wanita" class="dropdown-item">Sepatu Wanita</a>
                            </div>
                        </div>
                        <a href="shop.php?kategori=Sandal" class="nav-item nav-link">Sandal</a>
                        <a href="shop.php?kategori=Celana Jeans Pria" class="nav-item nav-link">Celana Jeans</a>
                        
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Celana Olahraga<i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute border-0 rounded-0 w-100 m-0">
                                <a href="shop.php?kategori=Celana Olahraga Pria" class="dropdown-item">Celana Olahraga Pria</a>
                                <a href="shop.php?kategori=Celana Olahraga Wanita" class="dropdown-item">Celana Olahraga Wanita</a>
                            </div>
                        </div>
                        <a href="shop.php?kategori=Rok Wanita" class="nav-item nav-link">Rok Wanita</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="display-5"><img class="mb-2 ml-2" src="img/pht/Gaya-Gini.png" alt="" width="102,4" height="60"></h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link text-center">Beranda</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle text-center" data-toggle="dropdown"> Halaman</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.php" class="dropdown-item text-center">Troli</a>
                                    <a href="checkout.php" class="dropdown-item text-center">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link text-center">Tentang Kami</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 ">
                        <?php 
                        
                        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
                            // Pengguna belum login, alihkan ke halaman login
                            echo '
                            <a href="login.php" class="nav-item nav-link text-center font-weight-semi-bold">Login</a>
                            <a href="register.php" class="nav-item nav-link text-center font-weight-semi-bold">Daftar</a>
                            ';
                        }
                        else {
                            $pengguna = $_SESSION['username'];
                            echo '
                            <a href="#" class="nav-item nav-link text-center font-weight-semi-bold mt-1">Selamat datang, '.$pengguna.'</a>
                            <a href="logout.php" class="btn nav-item mt-3 text-center font-weight-semi-bold btn-outline-danger text-danger h-50">Keluar</a>
                        ';
                        
                        }
                        
                        ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-1">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <?php 
                echo '<p class="m-0"><a href="shop.php?kategori='.$result['kategori'].'">Kembali</a></p>';
                ?>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><?php echo $result['kategori']?></p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <?php
                    // Mencari jumlah foto dengan judul yang sama pada folder produk
                    $judulFoto = $idbarang;
                    $fotoPath = "produk/" . $judulFoto . "*.png";
                    $fotoFiles = glob($fotoPath);
                    $jumlahFoto = count($fotoFiles);
                    $harga = number_format($result['hargabarang'], 0, ',', '.');
                    $hargavar = $result['hargabarang'];
                    if ($jumlahFoto > 1) { //NANTI
                        // Tampilkan carousel jika terdapat lebih dari satu foto
                ?>
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                            // Membuat indikator untuk setiap foto
                            for ($i = 0; $i < $jumlahFoto; $i++) {
                                echo '<li data-target="#product-carousel" data-slide-to="' . $i . '"';
                                if ($i === 0) {
                                    echo ' class="active"';
                                }
                                echo '></li>';
                            }
                        ?>
                    </ol>
                    <div class="carousel-inner border">
                        <?php
                            // Tampilkan setiap foto dalam carousel
                            foreach ($fotoFiles as $key => $fotoFile) {
                                echo '<div class="text-center carousel-item';
                                if ($key === 0) {
                                    echo ' active';
                                }
                                echo '">';
                                echo '<img src="' . $fotoFile . '" class="w-75 h-100" alt="'. $result['namabarang'] .'">';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-primary"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-primary"></i>
                    </a>
                </div>
            
                <?php
                    } elseif ($jumlahFoto === 1) {
                        // Tampilkan gambar tunggal jika hanya terdapat satu foto
                        $gambarPath = $fotoFiles[0];
                        echo '<div class="carousel slide" data-ride="carousel">';
                            echo '<div class="carousel-inner border text-center">';
                                echo '<div class="carousel-item active">';
                                echo '<img src="' . $gambarPath . '"class="w-75 h-100" alt="' . $result['namabarang'] . '">';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    } else {
                        // Tampilkan pesan jika tidak ada foto yang ditemukan
                        echo "Gambar tidak ditemukan.";
                    }
                ?>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?php echo $result['namabarang']?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <!-- <small class="far fa-star"></small> -->
                    </div>
                </div>
                <h3 class="font-weight-semi-bold mb-4">RP <?php echo $harga ?></h3>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Ukuran:</p>
                    <form id="ukuranForm">
                        <?php
                            // Ambil data ukuran dari tabel MySQL
                            $ukuran = $result['Ukuran'];
                            $ukuranArray = explode(",", $ukuran);
                            
                            // Tampilkan opsi ukuran
                            foreach ($ukuranArray as $index => $size) {
                                $checked = ($index === 0) ? 'checked' : ''; // Menandai opsi pertama sebagai terpilih
                                echo '<div class="custom-control custom-radio custom-control-inline">';
                                echo '<input type="radio" class="custom-control-input" id="size-' . $size . '" name="size" value="' . $size . '" ' . $checked . '>';
                                echo '<label class="custom-control-label" for="size-' . $size . '">' . $size . '</label>';
                                echo '</div>';
                            }
                        ?>
                    </form>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Warna:</p>
                    <form id="warnaForm">
                        <?php
                            // Ambil data warna dari tabel MySQL
                            $warna = $result['Warna'];
                            $warnaArray = explode(",", $warna);
                            
                            // Tampilkan opsi warna
                            foreach ($warnaArray as $index => $color) {
                                $checked = ($index === 0) ? 'checked' : ''; // Menandai opsi pertama sebagai terpilih
                                echo '<div class="custom-control custom-radio custom-control-inline">';
                                echo '<input type="radio" class="custom-control-input" id="color-' . $color . '" name="color" value="' . $color . '" ' . $checked . '>';
                                echo '<label class="custom-control-label" for="color-' . $color . '">' . $color . '</label>';
                                echo '</div>';
                            }
                        ?>
                    </form>
                </div>


                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary text-light btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input id="kuantitas" type="text" class="w-25 h-25 text-center border-light" value="1" min="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary text-light btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <script>
                            
                            var idbarang = "<?php echo $result['idbarang']?>"
                            var username = "<?php echo $pengguna; ?>";
                            var namabarang = "<?php echo $result['namabarang'] ?>";
                            var hargabarang = parseInt("<?php echo $hargavar; ?>");
                    </script>
                    <?php 
                        if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true ) {
                            // Pengguna belum login, alihkan ke halaman login
                            echo '
                            <a href="login.php" class="btn btn-primary px-3 text-light"><i class="fa fa-shopping-cart mr-1"></i> Tambah ke Troli</a>
                            ';
                        }
                        else {
                            echo '
                            <button class="tombol-troli btn btn-primary px-3 text-light"><i class="fa fa-shopping-cart mr-1"></i> Tambah ke Troli</button>
                            ';
                            
                        
                        }
                        
                        ?>
                <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
                <script type="text/javascript" src="fungsi.js"></script>
                    
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Bagikan produk:</p>
                    <div class="d-inline-flex">
                        <?php 
                        echo '<a class="text-dark px-2" href="https://www.facebook.com/sharer/sharer.php?u=gayagini.42web.io/detail.php?id='.$idbarang.'">';
                        echo '<i class="fab fa-facebook-f"></i>';
                        echo '</a>';
                        echo '<a class="text-dark px-2" href="https://twitter.com/intent/tweet?url=gayagini.42web.io/detail.php?id='.$idbarang.'">';
                        echo '<i class="fab fa-twitter"></i>';
                        echo '</a>';
                        echo '<a class="text-dark px-2" href="https://www.linkedin.com/shareArticle?url=gayagini.42web.io/detail.php?id='.$idbarang.'">';
                        echo '<i class="fab fa-linkedin-in"></i>';
                        echo '</a>';
                        echo '<a class="text-dark px-2" href="https://api.whatsapp.com/send?text=gayagini.42web.io/detail.php?id='.$idbarang.'">';
                        echo '<i class="fab fa-whatsapp"></i>';
                        echo '</a>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs text-primary justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link text-primary active" data-toggle="tab" href="#tab-pane-1">Deskripsi</a>
                    <a class="nav-item nav-link text-primary" data-toggle="tab" href="#tab-pane-2">Information</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Deskripsi Produk</h4>
                        <p>
                        Gaya yang trendi, fashion-forward, dan desain yang memikat menjadi ciri khas koleksi pakaian kami. Setiap produk kami dirancang dengan teliti untuk memberikan tampilan yang segar dan mengikuti tren terkini. Dari pakaian kasual yang santai hingga pakaian formal yang elegan, kami menawarkan beragam pilihan untuk berbagai suasana dan acara. Kami menggunakan bahan berkualitas tinggi dan mengutamakan pemilihan warna yang cerdas untuk menciptakan pakaian yang tidak hanya nyaman tetapi juga stylish. Temukan gaya unik Anda dalam koleksi kami yang beragam, yang memberikan sentuhan modern dan ekspresi pribadi pada setiap penampilan Anda.
                        </p>
                        </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Informasi Tambahan</h4>
                        <?php
                        $informasi_tambahan = array(
                            'gaya' => 'Gaya: Koleksi kami menawarkan gaya yang beragam, mulai dari gaya minimalis dan modern hingga gaya klasik yang elegan. Dengan pilihan yang luas, Anda dapat menemukan pakaian yang sesuai dengan gaya pribadi Anda.',
                            'fashion' => 'Fashion: Kami selalu mengikuti tren terkini dalam industri fashion untuk memberikan Anda pakaian yang up-to-date dan stylish. Dari motif cetak hingga pola warna yang trendi, kami menyediakan produk yang akan membuat Anda tampil modis dan fashionable.',
                            'desain' => 'Desain: Desain kami dipikirkan dengan detail dan inovatif. Mulai dari potongan yang pas hingga detail unik, setiap produk kami menampilkan desain yang menarik perhatian dan memberikan kesan yang istimewa.',
                            'suasana' => 'Suasana: Tersedia pakaian untuk berbagai suasana, baik itu acara formal, santai, atau aktivitas olahraga. Dari pakaian resmi yang elegan hingga pakaian kasual yang nyaman, Anda dapat menemukan produk yang sesuai untuk setiap kesempatan.'
                        );
                        // Mengurutkan array berdasarkan kunci (tema)
                        ksort($informasi_tambahan);

                        // Mencetak informasi sesuai urutan tema
                        foreach ($informasi_tambahan as $informasi) {
                            echo '<p class="text-justify"><ul><li>' . $informasi . '</li></ul></p>';
                        }
                        ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <?php 
    $queryRekomendasi = mysqli_query($connect, "SELECT * FROM databarang ORDER BY RAND() LIMIT 4");
    ?>
    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Kamu Mungkin Suka</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <?php
                    while ($row = mysqli_fetch_assoc($queryRekomendasi)) {
                        $gambarRekomendasi = $row['idbarang'] . ".png";
                        $gambarPathRekomendasi = "produk/" . $gambarRekomendasi;
                        $hargas = number_format($row['hargabarang'], 0, ',', '.');
                        $idbarangs = $row['idbarang'];
                    ?>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="<?php echo $gambarPathRekomendasi; ?>" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $row['namabarang']; ?></h6>
                            <div class="d-flex justify-content-center">
                                <h6>RP <?php echo $hargas; ?></h6>
                            </div>
                        </div>
                        <div class="card-footer justify-content-between text-center bg-light border">  
                            <?php     
                            echo '  <a href="detail.php?id='.$result['idbarang'].'" class="btn text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Lihat Detail</a>';
                            ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-footer text-dark mt-5 pt-1">
        <div class="row px-xl-5 pt-4">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-2 display-5 font-weight-semi-bold"><img class="border p-1 mb-3" src="img/pht/Gaya-Gini.png" alt="" width="141" height="83"></h1>
                </a>
                <p>Situs penjualan baju bergengsi dengan harga sepadan dan kualitas terbaik dari brand-brand ternama di alam semesta</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Bonjol Ali 32, Jambi, IND</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>gayagini@gg.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+62 854 783 21</p>
            </div>
            <div class="col-lg-8 col-md-12">   
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4 mt-1">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">GAYAGINI</a>. All Rights Reserved.
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com"></a><br>
                    Distributed By <a class="text-dark font-weight-semi-bold" href="https://themewagon.com" target="_blank">GAYAGINI </a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>