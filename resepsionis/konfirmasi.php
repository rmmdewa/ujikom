<?php  
include '../koneksi.php';

$id_pesanan = $_POST['id_pesanan'];
$status = $_POST['status'];

mysqli_query($con, "update pemesanan set status='$status' where id_pesanan='$id_pesanan'");
header("location:index.php");
?>