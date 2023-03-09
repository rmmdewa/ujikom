<?php  
include '../koneksi.php';

$id_pesanan = $_POST['id_pesanan'];
$bayar = $_POST['bayar'];

mysqli_query($con, "update pemesanan set bayar='$bayar' where id_pesanan='$id_pesanan'");
header("location:pembayaran.php");
?>