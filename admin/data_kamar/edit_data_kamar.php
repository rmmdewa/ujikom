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
                        <h4>Edit Data Kamar
                            <a href="index.php" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['id'])){
                            $id_kamar = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM kamars WHERE id_kamar='$id_kamar' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0){
                                $kamar = mysqli_fetch_array($query_run);
                                ?>
                            <form action="controller_kamar.php" method="post">
                                    <input type="hidden" name="id_kamar" value="<?= $kamar['id_kamar']; ?>">
                                <div class="mb-3">
                                    <label>Tipe Kamar</label>
                                    <select id="type" name="tipe" class="form-control">
                                        <?php $tipe = $kamar['tipe'];?>
                                        <option value="Reguler" <?= $tipe == 'Reguler' ? 'selected' : null; ?> >Reguler</option>
                                        <option value="Deluxe" <?= $tipe == 'Deluxe' ? 'selected' : null; ?> >Deluxe</option>
                                        <option value="Superior" <?= $tipe == 'Superior' ? 'selected' : null; ?> >Superior</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>No Kamar</label>
                                    <input type="text" name="no" value="<?= $kamar['no'];?>" class="form-control">
                                </div>                                                          
                                <div class="mb-3">
                                    <label>Lantai Kamar</label>
                                    <select id="lt" name="lantai" class="form-control">
                                        <?php $lantai = $kamar['lantai'];?>
                                        <option value="2" <?= $lantai == '2' ? 'selected' : null; ?>>2</option>
                                        <option value="3" <?= $lantai == '3' ? 'selected' : null; ?>>3</option>
                                        <option value="4" <?= $lantai == '4' ? 'selected' : null; ?>>4</option>
                                        <option value="5" <?= $lantai == '5' ? 'selected' : null; ?>>5</option>
                                        <option value="6" <?= $lantai == '6' ? 'selected' : null; ?>>6</option>
                                        <option value="7" <?= $lantai == '7' ? 'selected' : null; ?>>7</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Status Kamar</label>
                                    <select id="st" name="status" class="form-control">
                                        <?php $status = $kamar['status'];?>
                                        <option value="Tersedia" <?= $status == 'Tersedia' ? 'selected' : null; ?> >Tersedia</option>
                                        <option value="Terisi" <?= $status == 'Terisi' ? 'selected' : null; ?>>Terisi</option>
                                        <option value="Maintance"> <?= $status == 'Maintance' ? 'selected' : null; ?>Maintance</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>No Fasilitas</label>
                                    <select name="no_fasilitas" class="form-control">
                                        <?php $no_fasilitas = $kamar['no_fasilitas'];?>
                                        <option value="">Pilih Fasilitas</option>
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
                                        <button type="submit" name="ubah_data_kamar" class="btn btn-primary">
                                            Ubah Data Kamar
                                        </button>
                            </form>
                            <?php
                            }
                            else
                            {
                                echo "<h4>Data Kamar Tidak Ditemukan</h4>";
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