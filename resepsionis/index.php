<?php
    session_start();
    require '../koneksi.php';

?>

<?php include('layout/header.php') ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id = "table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Tamu</th>
                                    <th>Tanggal Cek In</th>
                                    <th>Tanggal Cek Out</th>
                                    <th>No Kamar</th>
                                    <th>Harga Kamar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $data = mysqli_query($con, "select * from pemesanan");
                                while($d = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                    <td><?php echo $d['id_pesanan']; ?></td>
                                    <td><?php echo $d['nama_tamu']; ?></td>
                                    <td><?php echo $d['cek_in']; ?></td>
                                    <td><?php echo $d['cek_out']; ?></td>
                                    <td>
                                    <?php 
                                    $kamar = mysqli_query($con, "select * from kamars");
                                    while ($a = mysqli_fetch_array($kamar)) {
                                        if ($a['id_kamar'] == $d['id_kamar']) { ?>
                                        <?php echo $a['no']; ?>
                                        <?php
                                        }
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <p class="badge bg-danger bg-sm"> Rp. <?= number_format($d['harga'],0, ',' , '.')?> </p>
                                    </td>
                                    <td>
                                    <?php
                                    if ($d['status'] == 1) { ?>
                                        <span class="badge bg-warning">Belum di Konfirmasi</span>
                                    <?php } else { ?>
                                        <span class="badge bg-success">Sudah di Konfirmasi</span>
                                    <?php } ?>
                                    </td>
                                    <td>
                                    <form action="konfirmasi.php" method="POST">
                                        <input type="hidden" name="id_pesanan" value="<?php echo $d['id_pesanan']; ?>">
                                        <input type="hidden" name="status" value="4">
                                        
                                        <?php
                                            if ($d['status'] == 1) { ?>
                                                <button class="btn btn-sm btn-primary">Konfirmasi</button>
                                            <?php } else { ?>
                                                <span> </span>
                                            <?php } ?>
                                    </form>
                                    <a href="detail_data_tamu.php?id=<?= $d['id_pesanan']; ?>" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../layout/footer.php') ?>
                                         