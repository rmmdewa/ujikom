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
                                    <th>No Fasilitas</th>
                                    <th>Fasilitas Kamar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                    $query = "SELECT * FROM fasilitas_kamar";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $faskamar){
                                            ?>
                                            <tr>
                                                <td><?= $faskamar['no_fasilitas']?></td>
                                                <td><?= $faskamar['fasilitas']?></td>
                                                <td>
                                                    <a href="edit_fasilitas_kamar.php?id=<?= $faskamar['no_fasilitas']; ?>" class="btn btn-warning btn-sm">Ubah Data</a>
                                                    <form action="config/controller_kamar.php" method="POST" class="d-inline">
                                                        <button type="submit" name="hapus_fasilitas_kamar" value="<?=$faskamar['no_fasilitas'];?>" class="btn btn-danger btn-sm">Hapus Data</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Belum Ada Data Fasilitas </h5>";
                                    }
                                 ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="tambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Data Fasilitas</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="controller_fasilitas_kamar.php" method="post">
                                    <div class="mb-3">
                                        <label >Fasilitas Kamar</label>
                                        <textarea class="form-control" name="faskm" rows="4" cols="50"> </textarea>
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

<?php include('../../layout/footer.php') ?>
