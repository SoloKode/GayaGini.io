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
    <title>GayaGini - Checkout</title>
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

            <div   div class="col-lg-3 col-6 text-right">
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
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Data Pembayaran</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Nama Depan</label>
                            <input class="form-control" type="text" placeholder="Nama depan">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Nama Belakang</label>
                            <input class="form-control" type="text" placeholder="Nama belakang">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="contoh@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>No Hp</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Alamat</label>
                            <input class="form-control" type="text" placeholder="Jl Untung Surapati">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Pengiriman</label>
                            <select class="custom-select">
                                <option selected>Sumatera</option>
                                <option>Diluar Pulau Sumatera</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Kota</label>
                            <input class="form-control" type="text" placeholder="Jambi">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Kode Pos</label>
                            <input class="form-control" type="text" placeholder="36136">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            <?php
            // Lakukan koneksi ke database

            // Periksa apakah pengguna telah login dan dapatkan userid
            if (isset($_SESSION['userid'])) {
                $userid = $_SESSION['userid'];
            
                // Query untuk mengambil data total dari tabel checkout
                $queryss = "SELECT total FROM checkout WHERE userid = $userid";
                $resultss = $connect->query($queryss);
            
                if ($resultss->num_rows > 0) {
                    $row = $resultss->fetch_assoc();
                    $totalzs = $row['total'];
                    $totalz = number_format($totalzs, 0, ',', '.');
                } else {
                    // Jika data tidak ditemukan, set total menjadi 0
                    $totalz = 0;
                }
            } else {
                // Jika pengguna belum login, set total menjadi 0
                $totalz = 0;
            }
            
            ?>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">RP <?php echo $totalz; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">DANA</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">BANK MANDIRI</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="tombol-checkout btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3 text-light">Pesan Produk</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.tombol-checkout').click(function(event) {
            event.preventDefault(); // Mencegah form submit secara default
            alert("Transaksi Berhasil");
            alert("Terima Kasih Telah Mengunjungi GAYAGINI - Ini merupakan Tugas Perkuliahan");
            window.location.href = "contact.php"
        });
    });
</script>

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