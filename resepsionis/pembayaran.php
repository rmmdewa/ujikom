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
                                    <th>Yg belum dibayar</th>
                                    <th>Yg sudah dibayar</th>
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
                                        <?php 
                                        $hasil = $d['harga'] - $d['bayar'];
                                        ?>
                                        <p class="badge bg-danger btn-sm"> Rp. <?= number_format($hasil,0, ',' , '.')?> </p>
                                    </td>
                                    <td>
                                        <p class="badge bg-danger btn-sm"> Rp. <?= number_format($d['bayar'],0, ',' , '.')?> </p>
                                    </td>
                                    <td>
                                    <?php
                                    if ($hasil == 0) { ?>
                                        <span class="badge bg-success">Sudah Lunas</span>
                                    <?php } else { ?>
                                        <span class="badge bg-warning">Belum Lunas</span>
                                    <?php } ?>
                                    </td>
                                    <td>
                                    <form action="konfirmasi_pembayaran.php" method="POST">
                                        <div class="modal fade" id="modalpemesanan">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <div class="row mb-5 card" >
                                                                <h1 class="mb-4">Form Pembayaran Hotel</h1>

                                                                <div class="mb-3 text-center">
                                                                <input type="hidden" name="id_pesanan" value="<?php echo $d['id_pesanan']; ?>">
                                                                    <label class="form-label">Masukkan Uang yang akan dibayar</label>
                                                                    <input type="text" class="form-control" name="bayar">
                                                                </div>	

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <?php
                                                if ($hasil == 0) { ?>
                                                    <span class="badge bg-success">Lunas</span>
                                                <?php } else { ?>
                                                    <button class="btn btn-info btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#modalpemesanan">Bayar</button>
                                                <?php } ?>
                                    </form>
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
                                         