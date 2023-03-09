<?php
session_start();
require '../../koneksi.php';
include '../layout/header.php';
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Fasilitas Kamar
                            <a href="index.php" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['id']))
                        {
                            $no_fasilitas = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM fasilitas_kamar WHERE no_fasilitas='$no_fasilitas' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $faskamar = mysqli_fetch_array($query_run);
                                ?>
                                <form action="controller_fasilitas_kamar.php" method="post">
                                    <input type="hidden" name="no_fasilitas" value="<?= $faskamar['no_fasilitas']; ?>">
                                    <div class="mb-3">
                                        <label>Fasilitas Kamar</label>
                                        <textarea class="form-control" name="faskm" rows="4" cols="50"><?= $faskamar['fasilitas'];?>"</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="ubah_fasilitas_kamar" class="btn btn-primary">
                                            Ubah Fasilitas Kamar
                                        </button>
                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Data Fasilitas Kamar Tidak Ditemukan</h4>";
                            }
                        } else {
                            echo "<script>alert('Data Gagal Di Ubah');
                            document.location='index.php'</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>