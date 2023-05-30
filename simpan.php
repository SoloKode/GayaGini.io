<?php 

include('connect.php');

$idbarang       = $_POST['idbarang'];
$namabarang    = $_POST['namabarang'];
$hargabarang    = $_POST['hargabarang'];
$kategori    = $_POST['kategori'];
 
$insert = mysqli_query($connect, "insert into databarang set idbarang='$idbarang' , namabarang='$namabarang', hargabarang=$hargabarang, kategori='$kategori'");

?>