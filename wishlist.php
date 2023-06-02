<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wishlist</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        Wishlist
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Kategori
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Pakaian Pria</a></li>
              <li><a class="dropdown-item" href="#">Pakaian Wanita</a></li>
              <li><a class="dropdown-item" href="#">Sepatu Pria</a></li>
              <li><a class="dropdown-item" href="#">Sepatu Wanita</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Wishlist</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container my-5">
    <h1>Wishlist</h1>
    <div class="row mt-4">
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="img/product-1.jpg" alt="Product 1" class="img-fluid">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Product 1</h5>
                <p class="card-text">$150</p>
                <p class="card-text"><small class="text-muted">Qty: 1</small></p>
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="img/product-2.jpg" alt="Product 2" class="img-fluid">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Product 2</h5>
                <p class="card-text">$100</p>
                <p class="card-text"><small class="text-muted">Qty: 2</small></p>
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Ringkasan</h5>
            <table class="table">
              <tbody>
                <tr>
                  <td>Total Item</td>
                  <td>3</td>
                </tr>
                <tr>
                  <td>Total Harga</td>
                  <td>$350</td>
                </tr>
              </tbody>
            </table>
            <a href="#" class="btn btn-primary btn-block">Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-center text-white py-3">
    <p>&copy; 2023 Wishlist. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>
