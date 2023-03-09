<?php
    session_start();
    
    require '../../koneksi.php';

?>

<?php include('../layout/header.php') ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id = "table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipe Kamar</th>
                                    <th>No Kamar</th>
                                    <th>Lantai Kamar</th>
                                    <th>Status Kamar</th>
                                    <th>Fasilitas No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                    $query = "SELECT * FROM kamars";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $kamar)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $kamar['id_kamar']?></td>
                                                <td><?= $kamar['tipe']?></td>
                                                <td><?= $kamar['no']?></td>
                                                <td><?= $kamar['lantai']?></td>
                                                <td><?= $kamar['status']?></td>
                                                <td><?= $kamar['no_fasilitas']?></td>
                                                <td>
                                                    <a href="edit_data_kamar.php?id=<?= $kamar['id_kamar']; ?>" class="btn btn-warning btn-sm">Ubah Data</a>
                                                    <form action="controller_kamar.php" method="POST" class="d-inline">
                                                        <button type="submit" name="hapus_data_kamar" value="<?=$kamar['id_kamar'];?>" class="btn btn-danger btn-sm">Hapus Data</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Belum Ada Data kamar </h5>";
                                    }
                                 ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="tambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Data Kamar</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="controller_kamar.php" method="post">
                                    <div class="mb-3">
                                        <label>Tipe Kamar</label> <br>
                                        <select id="type" name="tipe" class="form-control">
                                            <option value="Reguler">Reguler</option>
                                            <option value="Deluxe">Deluxe</option>
                                            <option value="Superior">Superior</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label >No Kamar</label>
                                        <input type="text" name="no" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Lantai Kamar</label> <br>
                                        <select id="lt" name="lantai" class="form-control">
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Status Kamar</label> <br>
                                        <select id="st" name="status" class="form-control">
                                            <option value="Tersedia">Tersedia</option>
                                            <option value="Terisi">Terisi</option>
                                            <option value="Maintance">Maintance</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Fasilitas No</label> <br>
                                        <select name="no_fasilitas" class="form-control">
                                            <option value="">Fasilitas No</option>
                                            <?php 
                                            include '../../koneksi.php';
                                            $data = mysqli_query($con, "select * from fasilitas_kamar");
                                            while($d = mysqli_fetch_array($data)) {
                                                ?>
                                                <option value="<?php echo $d['no_fasilitas']; ?>"> <?php echo $d['no_fasilitas']; ?></option>
                                                <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../layout/footer.php') ?>
