<?php
    session_start();
    require '../koneksi.php';

?>

<?php include('layout/header.php') ?>

    <div class="container mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Data Tamu
                        <a href="index.php" class="btn btn-danger float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if(isset($_GET['id']))
                    {
                        $id_pesanan = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM pemesanan WHERE id_pesanan='$id_pesanan' ";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $d = mysqli_fetch_array($query_run);
                            ?>
                                <div class="mb-3">
                                    <label>Nama Tamu</label>
                                    <p class="form-control">
                                        <?= $d['nama_tamu'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Cek In</label>
                                    <p class="form-control">
                                        <?= $d['cek_in'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Cek Out</label>
                                    <p class="form-control">
                                        <?= $d['cek_out'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Nama Pemesan</label>
                                    <p class="form-control">
                                        <?= $d['nama_pemesan'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Email Pemesan</label>
                                    <p class="form-control">
                                        <?= $d['email_pemesan'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>No Hp Pemesan</label>
                                    <p class="form-control">
                                        <?= $d['hp_pemesan'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>No Kamar</label>
                                    <p class="form-control">
                                    <?php 
                                    $kamar = mysqli_query($con, "select * from kamars");
                                    while ($a = mysqli_fetch_array($kamar)) {
                                        if ($a['id_kamar'] == $d['id_kamar']) { ?>
                                        <?php echo $a['no']; ?>
                                        <?php
                                        }
                                    }
                                    ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Harga Kamar</label>
                                     <p class="form-control"> 
                                       <span class="badge bg-danger"> Rp. <?= number_format($d['harga'],0, ',' , '.')?> </span>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Status</label>
                                    <p class="form-control">
                                    <?php
                                    if ($d['status'] == 1) { ?>
                                        <span class="badge bg-warning">Belum di Konfirmasi</span>
                                    <?php } else { ?>
                                        <span class="badge bg-success">Sudah di Konfirmasi</span>
                                    <?php } ?>
                                    </p>
                                </div>

                            <?php
                                
                        }
                        else
                        {
                            echo "<h4>Data Tamu Tidak Ditemukan</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>