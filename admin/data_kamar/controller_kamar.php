<?php
session_start();
require '../../koneksi.php';

if(isset($_POST['hapus_data_kamar']))
{
    $id_kamar = mysqli_real_escape_string($con, $_POST['hapus_data_kamar']);

    $query = "DELETE FROM kamars WHERE id_kamar='$id_kamar' ";
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

if(isset($_POST['ubah_data_kamar']))
{
    $id_kamar = mysqli_real_escape_string($con, $_POST['id_kamar']);
    $tipe = mysqli_real_escape_string($con, $_POST['tipe']);
    $no = mysqli_real_escape_string($con, $_POST['no']);
    $lantai = mysqli_real_escape_string($con, $_POST['lantai']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $no_fasilitas = mysqli_real_escape_string($con, $_POST['no_fasilitas']);

    $query = "UPDATE kamars SET tipe='$tipe', no='$no', lantai='$lantai', status='$status', no_fasilitas='$no_fasilitas' WHERE id_kamar='$id_kamar' ";
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
    $tipe = mysqli_real_escape_string($con, $_POST['tipe']);
    $no = mysqli_real_escape_string($con, $_POST['no']);
    $lantai = mysqli_real_escape_string($con, $_POST['lantai']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $no_fasilitas = mysqli_real_escape_string($con, $_POST['no_fasilitas']);


    $query = "INSERT INTO kamars (tipe,no,lantai,status,no_fasilitas) VALUES
    ('$tipe', '$no', '$lantai', '$status','$no_fasilitas')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        echo "<script>alert('Data Berhasil Di Simpan!');
        document.location='index.php'</script>";
    }
    else
    {
        echo "<script>alert('Maaf Data Gagal Di Simpan');
                document.location='index.php'</script>";
    }
}
?>