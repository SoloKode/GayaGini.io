$(document).ready(function() {
    selesai();
});
 
function selesai() {
	setTimeout(function() {
		update();
		selesai();
	}, 200);
}
 
function update() {
    $.getJSON("data.php", function(data) {
      $("table").empty();
      var no = 1;
      $.each(data.result, function() {
        var idbarang = this['idbarang'];
        var namabarang = this['namabarang'];
        var hargabarang = this['hargabarang'];
        var kategori = this['kategori'];
        var detailLink = "<a href='detail-barang.php?id=" + idbarang + "'>Detail</a>";
        
        $("table").append("<tr><td>"+(no++)+"</td><td>"+idbarang+"</td><td>"+namabarang+"</td><td>"+hargabarang+"</td><td>"+kategori+"</td><td>"+detailLink+"</td></tr>");
      });
    });
  }

  $(document).ready(function() {
    $('.tombol-troli').click(function(event) {
      event.preventDefault(); // Mencegah form submit secara default
  
      // Mengambil nilai ukuran terpilih
      var ukuranForm = document.getElementById('ukuranForm');
      var ukuranTerpilih = ukuranForm.querySelector('input[name="size"]:checked').value;
  
      // Mengambil nilai warna terpilih
      var warnaForm = document.getElementById('warnaForm');
      var warnaTerpilih = warnaForm.querySelector('input[name="color"]:checked').value;
      var kuantitas = parseInt(document.getElementById('kuantitas').value);
      // Mengambil nilai input
      var useridss = window.userid;
      var idbarangss = window.idbarang;
      var usernamess = window.username;
      var namabarangss = window.namabarang;
      var hargab = window.hargabarang;
      var hargabarangss = hargab * kuantitas;
  
      // Mengirim data ke skrip PHP menggunakan AJAX
      $.ajax({
        type: 'POST',
        url: 'tambah_troli.php',
        data: {
          kuantitas:kuantitas,
          useridss:useridss,
          idbarangss: idbarangss,
          usernamess: usernamess,
          namabarangss: namabarangss,
          hargabarangss: hargabarangss,
          ukuranTerpilih: ukuranTerpilih,
          warnaTerpilih: warnaTerpilih
        },
        success: function(response) {
          if (response.success) {
            // Jika login berhasil
            alert(response.message);
            // Lakukan tindakan selanjutnya, misalnya mengarahkan pengguna ke halaman lain
            // window.location.href = "index.php"
            // window.location.href = response.redirect;
          } else {
            // Jika login gagal
            alert('Troli gagal: ' + response.message);
          }
        },
        error: function() {
          // Jika terjadi kesalahan saat melakukan AJAX
          alert('Terjadi kesalahan saat memproses login');
        }
      });
    });
  });

  $(document).ready(function() {
    $('.tombol-login').click(function(event) {
      event.preventDefault(); // Mencegah form submit secara default
  
      // Mengambil nilai input
      var username = $('#username').val();
      var password = $('#password').val();
  
      // Mengirim data ke skrip PHP menggunakan AJAX
      $.ajax({
        type: 'POST',
        url: 'check_login.php', // Ganti dengan lokasi skrip PHP yang mengecek login
        data: { username: username, password: password },
        success: function(response) {
          if (response.success) {
            // Jika login berhasil
            alert(response.message);
            // Lakukan tindakan selanjutnya, misalnya mengarahkan pengguna ke halaman lain
            // window.location.href = "index.php"
            window.location.href = response.redirect;
          } else {
            // Jika login gagal
            alert('Login gagal: ' + response.message);
          }
        },
        error: function() {
          // Jika terjadi kesalahan saat melakukan AJAX
          alert('Terjadi kesalahan saat memproses login');
        }
      });
    });
  });

  $(document).ready(function() {
    $('.tombol-lupa').click(function(event) {
      event.preventDefault(); // Mencegah form submit secara default
  
      // Mengambil nilai input
      var username = $('#username').val();
      var email = $('#email').val();
      var newpassword = $('#newpassword').val();
      // Mengirim data ke skrip PHP menggunakan AJAX
      $.ajax({
        type: 'POST',
        url: 'check_lupa.php', // Ganti dengan lokasi skrip PHP yang mengecek login
        data: { username: username, email: email, newpassword: newpassword},
        success: function(response) {
          if (response.success) {
            // Jika login berhasil
            alert(response.message);
            // Lakukan tindakan selanjutnya, misalnya mengarahkan pengguna ke halaman lain
            // window.location.href = "index.php"
          } else {
            // Jika login gagal
            alert('Verifikasi gagal: ' + response.message);
          }
        },
        error: function() {
          // Jika terjadi kesalahan saat melakukan AJAX
          alert('Terjadi kesalahan saat memproses Verifikasi');
        }
      });
    });
  });

$(".tombol-daftar").click(function(){
    var data = $('.form-user').serialize();
    $.ajax({
      type: 'POST',
      url: "registersql.php",
      data: data,
      success: function(response) {
        if (response.success) {
          alert("Daftar Berhasil");
        } else {
          alert("Gagal mendaftar: " + response.message);
        }
      },
      error: function() {
        alert('Daftar Gagal');
      }
    });
  });
  
$(".tombol-simpan").click(function(){
	var data = $('.form-user').serialize();
	$.ajax({
		type: 'POST',
		url: "simpan.php",
		data: data,
		success: function() {
			alert('input data berhasil');
		}
	});
});