<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Form Register</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <a href="index.php">
        <h1 class="text-center mt-4 font-weight-bold text-primary">GayaGini</h1>
        </a>
        <h2 class="text-center font-weight-light">Daftar</h2>
        <form method="POST" class="form-user">
          <div class="form-group">
            <label for="username">Nama Pengguna</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Nama Pengguna" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email Anda" required>
          </div>
          <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Kata Sandi" required>
          </div>
          <div class="form-group">
            <label for="confirmPassword">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Konfirmasi Kata Sandi" required>
            <small id="passwordDigit" class="text-danger d-none">Password harus memiliki setidaknya 8 karakter.</small><br>
            <small id="passwordError" class="text-danger d-none">Kata Sandi dan Konfirmasi Kata Sandi tidak sesuai.</small>
          </div>
          <button type="submit" class="tombol-daftar btn btn-primary btn-block">Daftar</button>
          <div class="text-center mt-3">
            Sudah punya akun? <a href="login.php" class="text-primary">Masuk disini</a>
          </div>
        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="fungsi.js"></script>
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            var passwordInput = document.getElementById('password');
            var confirmPasswordInput = document.getElementById('confirmPassword');
            var passwordError = document.getElementById('passwordError');
            var passwordDigit = document.getElementById('passwordDigit');
            var submitButton = document.querySelector('.tombol-daftar');
            
            confirmPasswordInput.addEventListener('input', function() {
              if (passwordInput.value !== confirmPasswordInput.value) {
                passwordError.classList.remove('d-none');
                submitButton.disabled = true;
              } else {
                passwordError.classList.add('d-none');
                submitButton.disabled = false;
              }
              if (passwordInput.value.length < 8 && confirmPasswordInput.value.length < 8) {
                passwordDigit.classList.remove('d-none');
                submitButton.disabled = true;
              } else {
                passwordDigit.classList.add('d-none');
                submitButton.disabled = false;
              }
            });

            var form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
              if (passwordInput.value !== confirmPasswordInput.value) {
                event.preventDefault();
                passwordError.classList.remove('d-none');
              }
              if (passwordInput.value.length < 8 && confirmPasswordInput.value.length < 8) {
                event.preventDefault();
                passwordDigit.classList.remove('d-none');
              }
            });
            });
        </script>
      </div>
    </div>
  </div>
</body>
</html>
