<?php
session_start();
require '../../koneksi.php';

if(isset($_POST['hapus_fasilitas_kamar']))
{
    $no_fasilitas = mysqli_real_escape_string($con, $_POST['hapus_fasilitas_kamar']);

    $query = "DELETE FROM fasilitas_kamar WHERE no_fasilitas='$no_fasilitas' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo "<script>alert('Data Berhasil Di Hapus');
                document.location='index.php'</script>";
    }
    else
    {
        echo "<script>alert('Maaf Data Gagal Di Hapus');
                document.location='index.php'</script>";
    }
}

if(isset($_POST['ubah_fasilitas_kamar']))
{
    $no_fasilitas = mysqli_real_escape_string($con, $_POST['no_fasilitas']);
    $faskm = mysqli_real_escape_string($con, $_POST['faskm']);


    $query = "UPDATE fasilitas_kamar SET fasilitas='$faskm' WHERE no_fasilitas='$no_fasilitas' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo "<script>alert('Data Berhasil Di Ubah');
                document.location='index.php'</script>";
    }
    else
    {
        echo "<script>alert('Maaf Data Gagal Di Ubah');
                document.location='index.php'</script>";
    }
}


if(isset($_POST['simpan']))
{
    $faskm = mysqli_real_escape_string($con, $_POST['faskm']);



    $query = "INSERT INTO fasilitas_kamar (fasilitas) VALUES
    ('$faskm')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        echo "<script>alert('Data Berhasil Di Simpan');
                document.location='index.php'</script>";
    }
    else
    {
        echo "<script>alert('Maaf Data Gagal Di Simpan');
                document.location='index.php'</script>";
    }
}
?>