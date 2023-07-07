<?php 
    include 'connect.php';
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
       
    }
    else {
        $userid = $_SESSION['userid'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GayaGini Fashion Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="GAYAGINI Fashion Shop" name="keywords">
    <meta content="Online Shop Pilihan Anak Muda" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

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
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
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
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Online Shop Pilihan Anak Muda</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">GAYAGINI</h3>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Online Shop Pilihan Anak Muda</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">GAYAGINI</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-solid fa-check-circle m-0 mr-3 text-primary" ></h1>
                    <h5 class="font-weight-semi-bold m-0 text-center">Kualitas Terjamin</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-sharp fa-truck-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Pengiriman Cepat</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-solid fa-money-bill-transfer text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Multi Payment</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-solid fa-headset text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Layanan 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 id="tengah-halaman"class="section-title px-5"><span class="px-2">Kategori</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="" class="cat-img position-relative overflow-hidden mb-3" data-toggle="modal" data-target="#dialogModal">
                    <img class="img-fluid" src="img/cat-1.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Kaos</h5>
                    

                <!-- Modal -->
                <div class="modal fade" id="dialogModal" tabindex="-1" role="dialog" aria-labelledby="dialogTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title" id="dialogTitle">Silakan pilih salah satu opsi:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <a href="shop.php?kategori=Kaos Pria" class="btn btn-primary btn-block rounded-pill text-light">Kaos Pria</a>
                                    </div>
                                    <div   div class="col-6">
                                        <a href="shop.php?kategori=Kaos Wanita" class="btn btn-primary btn-block rounded-pill text-light">Kaos Wanita</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="" class="cat-img position-relative overflow-hidden mb-3" data-toggle="modal" data-target="#dialogModal1">
                    <img class="img-fluid" src="img/pht/22.png" alt="" width="500" height="400">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Kemeja</h5>
                    <div class="modal fade" id="dialogModal1" tabindex="-1" role="dialog" aria-labelledby="dialogTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title" id="dialogTitle">Silakan pilih salah satu opsi:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <a href="shop.php?kategori=Kemeja Pria" class="btn btn-primary btn-block rounded-pill text-light">Kemeja Pria</a>
                                    </div>
                                    <div   div class="col-6">
                                        <a href="shop.php?kategori=Kemeja Wanita" class="btn btn-primary btn-block rounded-pill text-light">Kemeja Wanita</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="shop.php?kategori=hoodie" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/cat-2.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Hoodie</h5>
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="shop.php?kategori=aksesoris" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/aksesoris.png" alt="">
                      
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Aksesoris</h5>
               
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="" class="cat-img position-relative overflow-hidden mb-3" data-toggle="modal" data-target="#dialogModal2">
                        <img class="img-fluid" src="img/cat-3.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Sepatu</h5>
                    <div class="modal fade" id="dialogModal2" tabindex="-1" role="dialog" aria-labelledby="dialogTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="dialogTitle">Silakan pilih salah satu opsi:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <a href="shop.php?kategori=Sepatu Pria" class="btn btn-primary btn-block rounded-pill text-light">Sepatu Pria</a>
                                    </div>
                                    <div   div class="col-6">
                                        <a href="shop.php?kategori=Sepatu Wanita" class="btn btn-primary btn-block rounded-pill text-light">Sepatu Wanita</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="shop.php?kategori=Sandal" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/pht/9.png" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Sandal</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="shop.php?kategori=Celana Jeans Pria" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/pht/Celana Jeans Long Pants Denim - Slim Fit Laki Laki.png" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Celana Jeans</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="" class="cat-img position-relative overflow-hidden mb-3" data-toggle="modal" data-target="#dialogModal3">
                        <img class="img-fluid" src="img/jogg.png" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Celana Olahraga</h5>
                     
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="shop.php?kategori=Rok Wanita" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/rok.png" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Rok Wanita</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-banner1 text-center text-md-right text-white mb-2 py-5 px-5">
                    <img class="ml-6" src="img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase font-weight-bold text-banner mb-1">GAYA TRENDI TERBARU</h5>
                        <h1 class="mb-4 font-weight-semi-bold text-second-banner">PARADE MUSIM COKELAT</h1>
                  
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-banner2 text-center text-md-left text-white mb-2 py-5 px-5">
                    <img class="mr-6" src="img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase font-weight-bold text-banner mb-1">GAYA TRENDI TERBARU</h5>
                        <h1 class="mb-4 font-weight-semi-bold text-second-banner">FESTIVAL NOL DERAJAT</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Produk Trendi</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php
            $queryProduk = mysqli_query($connect, "SELECT * FROM databarang ORDER BY RAND() LIMIT 8");
            while ($row = mysqli_fetch_assoc($queryProduk)) {
                $gambarProduk = $row['idbarang'] . ".png";
                $gambarPathProduk = "produk/" . $gambarProduk;
                $hargaproduk = number_format($row['hargabarang'], 0, ',', '.');
                $idproduk = $row['idbarang'];
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="<?php echo $gambarPathProduk; ?>" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $row['namabarang']; ?></h6>
                            <div class="d-flex justify-content-center">
                                <h6>IDR <?php echo $hargaproduk; ?></h6>
                            </div>
                        </div>
                        <div class="card-footer justify-content-between bg-light border text-center">
                            <?php
                            echo '<a href="detail.php?id=' . $idproduk . '" class="btn  text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Lihat Detail</a>';
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Products End -->



    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


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