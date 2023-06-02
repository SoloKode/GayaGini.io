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
  <title>GayaGini - Lupa Password</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 col-sm-8">
        <a href="index.php">
        <h1 class="text-center mt-4 font-weight-bold text-primary">GayaGini</h1>
        </a>
        <h2 class="text-center font-weight-light">Lupa Password</h2>
        <form method="POST" class="form-user">
            <div class="form-group mt-5">
                <label for="username">Nama Pengguna</label>
                <input type="text" class="form-control" id="username" placeholder="Masukan Nama Pengguna">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Masukan Email yang terdata.">
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi Baru</label>
                <input type="password" class="form-control" id="newpassword" placeholder="Masukan Kata Sandi">
            </div>
            <button type="submit" class="tombol-lupa btn btn-primary btn-block">Submit</button>
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="fungsi.js"></script>
      </div>
    </div>
  </div>
</body>
</html>
