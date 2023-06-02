<?php 
    include 'connect.php';
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
       
    }
    else {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="img/favicon.ico" rel="icon">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>GayaGini - Login</title>
  <meta content="GAYAGINI Fashion Shop" name="keywords">
  <meta content="Online Shop Pilihan Anak Muda" name="description">
</head>
<body>
    
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 col-sm-8">
        <a href="index.php">
        <h1 class="text-center mt-4 font-weight-bold text-primary">GayaGini</h1>
        </a>
        <h2 class="text-center font-weight-light">Login</h2>
        <form method="POST" class="form-user">
            <div class="form-group">
              <label for="username">Nama Pengguna</label>
              <input type="text" class="form-control" id="username" placeholder="Masukan Nama Pengguna">
            </div>
          
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" class="form-control" id="password" placeholder="Masukan Kata Sandi">
                <div class="form-group text-center ">
                    <a href="forgot.php" class="text-primary">Lupa Kata Sandi?</a>
                </div>  
            </div>
            <button type="submit" class="tombol-login btn btn-primary btn-block">Login</button>
            <div class="text-center mt-3">
            Belum punya akun?<a href="register.php" class="text-primary"> Daftar disini!</a>
            </div>
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="fungsi.js"></script>
      </div>
    </div>
  </div>
</body>
</html>