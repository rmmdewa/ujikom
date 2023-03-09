<?php
session_start();

include "koneksi.php";

$user = $_POST['username'];
$pass = md5($_POST['password']);
 
$login = mysqli_query($con, "SELECT * FROM users WHERE username = '$user' and password = '$pass'");
$cek = mysqli_num_rows($login);
 
if($cek > 0){
    $data = mysqli_fetch_assoc($login);
    
    if($data['password'] == $pass){

	session_start();
	$_SESSION['username'] = $user;
	$_SESSION['password'] = $pass;

    if ($data['level']=='1'){
        header('location:admin/data_kamar');
    } elseif ($data['level']=='2') {
        header('location:resepsionis');
    } elseif ($data['level']=='3') {
        header('location:index.php');
    }
} else {
	echo "<script>alert('Maaf login gagal, Password anda tidak sesuai');
            document.location='index.php'</script>";
        } 
    }else{
    echo "<script>alert('Maaf login gagal, Username anda tidak terdaftar');
    document.location='index.php'</script>";
    }
 
?>