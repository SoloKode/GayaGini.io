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