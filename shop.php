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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GayaGini - <?php echo $kategori ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
            <form action="">
                <div class="ml-4 input-group">
                    <input type="text" class="form-control" placeholder="Cari Produk">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>
            <a href="" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">0</span>
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
                            <a href="shop.php" class="nav-item nav-link text-center">Belanja</a>
                            <a href="detail.php" class="nav-item nav-link text-center">Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle text-center" data-toggle="dropdown"> Halaman</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.php" class="dropdown-item text-center">Troli</a>
                                    <a href="checkout.php" class="dropdown-item text-center">Checkout</a>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link text-center">Kontak</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 ">
                            <a href="login.php" class="nav-item nav-link text-center font-weight-semi-bold">Login</a>
                            <a href="register.php" class="nav-item nav-link text-center font-weight-semi-bold">Daftar</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-4 mt-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3"><?php echo $kategori; ?></h1>
            <div class="d-inline-flex">
                <p class="m-0 text-center"><a href="index.php">Beranda</a></p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

<center>

    
    <!-- Shop Start -->
    <div class="container-fluid pt-2">
    <div class="col-lg-9 col-md-12">
    <div class="row pb-3">
    <?php
        // Memeriksa apakah ada barang yang ditemukan
        if ($rowCount > 0) {
            while ($result = mysqli_fetch_array($query)) {
                $idbarang = $result['idbarang'];
                $gambar = $idbarang . ".png";
                $gambarPath = "produk/" . $gambar;
                $harga = number_format($result['hargabarang'], 0, ',', '.');

                // Periksa apakah file gambar ada
                if (file_exists($gambarPath)) {
                    // echo "<div class='barang'>";
                    // echo "<img src='".$gambarPath."' alt='Gambar Barang'>";
                    // echo "<h3>".$result['namabarang']."</h3>";
                    // echo "<p>Harga: ".$result['hargabarang']."</p>";
                    // echo "<a href='detail-barang.php?idbarang=".$idbarang."'>Detail</a>";
                    // echo "</div>";
                    echo '<div class="col-lg-4 col-md-6 col-sm-12 pb-1">';
                    echo '<div class="card product-item border-0 mb-4">';    
                    echo '<div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">';        
                    echo '<img class="img-fluid w-100" src="'.$gambarPath.'" alt="">';            
                    echo '</div>';        
                    echo '<div class="card-body border-left border-right text-center p-0 pt-4 pb-3">';        
                    echo '<h6 class="text-truncate mb-3">'.$result['namabarang'].'</h6>';            
                    echo '<div class="d-flex justify-content-center">';        
                    echo '<h6>RP '.$harga.'</h6>';              
                    echo '</div>';           
                    echo '</div>';       
                    echo '<div class="card-footer d-flex justify-content-between bg-light border">';        
                    echo '  <a href="detail.php?id='.$result['idbarang'].'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Lihat Detail</a>';          
                    echo '  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Tambah ke Troli</a>';          
                    echo '  </div>';      
                    echo '</div>';    
                    echo '</div>';
                } else {
                    echo '<div class="col-lg-4 col-md-6 col-sm-12 pb-1">';
                    echo '<div class="card product-item border-0 mb-4">';    
                    echo '<div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">';
                    echo '</div>';        
                    echo '<div class="card-body border-left border-right text-center p-0 pt-4 pb-3">';        
                    echo '<h6 class="text-truncate mb-3">'.$result['namabarang'].'</h6>';            
                    echo '<div class="d-flex justify-content-center">';        
                    echo '<h6>RP '.$harga.'</h6>';              
                    echo '</div>';           
                    echo '</div>';       
                    echo '<div class="card-footer d-flex justify-content-between bg-light border">';        
                    echo '  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Lihat Detail</a>';          
                    echo '  <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Tambah ke Troli</a>';          
                    echo '  </div>';      
                    echo '</div>';    
                    echo '</div>';
                }
            }
        } else {
            echo "<p>Tidak ada barang yang ditemukan dalam kategori ini.</p>";
        }
    ?>
            <!-- Shop Product Start -->
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Sebelumnnya</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Selanjutnya</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
</center>

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