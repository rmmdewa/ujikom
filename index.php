<?php include 'layout/header.php';
?>

	<main id="main">
		<div class="container">
			<div class="row section topspace">
				<div class="col-md-12">
					<h2 class="text-center"><span>Hotel Hebat</span></h2>
                    <div class="card row mb-3"></div>
					<div class="text-center">
						<div class="row mb-3">
							<div class="card-body">
								<img id="gmb" class="d-block w-100" src="assets/images/eas.jpg" height="450">
							</div>
                            <h2 class="text-center section mt-5" id="pskm"><span>Pesan Kamar</span></h2>
                            <div class="card row mb-3"></div>
						</div>	
							<form action="prosespesan.php" method="post">
								<div class="row">
									<div class="col"  id="about">
										<label>Tanggal Check in</label><br>
										<input type="date" name="cek_in" required>
									</div>
									<div class="col">
										<label>Tanggal Check out</label><br>
										<input type="date" name="cek_out" required>
									</div>
									<div class="col">
										<label>Jumlah Orang</label><br>
										<input type="text" name="jml_kamar" required>
										<button type="button" data-bs-toggle="modal" data-bs-target="#modalpemesanan">Pesan</button>
									</div >
								</div>
								<div class="modal fade" id="modalpemesanan">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Form Pemesanan</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="text-center">
													<div class="row mb-5 card" >
														<h1 class="mb-4">Pemesanan Hotel</h1>
														<div class="mb-3 text-center">
															<label class="form-label">Nama Pemesan</label>
															<input type="text" class="form-control" name="nama_pemesan" required>
														</div>
														<div class="mb-3 text-center">
															<label class="form-label">Email Pemesan</label>
															<input type="email" class="form-control" name="email_pemesan" required>
														</div>
														<div class="mb-3 text-center">
															<label class="form-label">No Hp Pemesan</label>
															<input type="text" class="form-control" name="hp_pemesan" required>
														</div>
														<div class="mb-3 text-center">
															<label class="form-label">Nama Tamu</label>
															<input type="text" class="form-control" name="nama_tamu" required>
														</div>
														<div>
															<label class="form-label">No. Kamar</label>
															<select name="id_kamar" class="form-control" required>
																<option class="text-center" value="">Pilih Kamar</option>
																<?php 
																include 'koneksi.php';
																$data = mysqli_query($con, "select * from kamars where status='tersedia'");
																while($d = mysqli_fetch_array($data)) {
																	?>
																	<option value="<?php echo $d['id_kamar']; ?>"> <?php echo $d['no']; ?></option>
																	<?php 
																}
																?>
															</select>
														</div>											
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Konfirmasi Pemesanan</button>
											</div>
										</div>
									</div>
								</div>
							</form>	
  					</div>
				</div>
			</div> 

			<h2 class="text-center section mt-5" id="kamar"><span>Kamar</span></h2>
			<div class="card row mb-5"></div>

            <div class="d-flex">
				<div class="row mb-5" >
					<div class="col-sm-12 font-monospace">
						<div class="row row-cols-4 row-cols-md-2 g-4 container">
							<div class="col">
									<div class="card">
                                        <h5 class="section-title card-header mt-3">Tipe Standard</h5>
                                        <img src="assets/images/bas.jpg" class="card-img-top" alt="Skyscrapers"/>
                                        <div class="card-body">
                                            <h5 class="card-title">Fasilitas :</h5>
                                            <p class="card-text">
                                                Wifi, Ac, 1 Kamar Tidur, 1 Kamar Mandi, 1 Dapur Kecil
                                            </p>
                                            <a href="#gmb" class="btn btn-success">Pesan Sekarang!</a>
                                        </div>
									</div>
								</div>
								<div class="col">
									<div class="card">
                                        <h5 class="section-title card-header mt-3">Tipe Reguler</h5>
                                        <img src="assets/images/bas.jpg" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                                        <div class="card-body">
                                            <h5 class="card-title">Fasilitas :</h5>
                                            <p class="card-text">
                                                Wifi, Ac, 3 Kamar Tidur, 2 Kamar Mandi, 1 Dapur Besar, Ruang Keluarga, PS 4, Xbox
                                            </p>
                                            <a href="#gmb" class="btn btn-success">Pesan Sekarang!</a>
                                        </div>
									</div>
								</div>
								<div class="col">
									<div class="card">
                                        <h5 class="section-title card-header mt-3">Tipe Deluxe</h5>
                                        <img src="assets/images/bas.jpg" class="card-img-top" alt="Palm Springs Road"/>
                                        <div class="card-body">
                                            <h5 class="card-title">Fasilitas :</h5>
                                            <p class="card-text">
                                                Wifi 5G, Ac, 3 Kamar Tidur, 2 Kamar Mandi, 1 Dapur Besar, Ruang Keluarga, PS 4, Xbox, Pc Gaming, Member Card GYM & Kolah Renang
                                            </p>
                                            <a href="#gmb" class="btn btn-success">Pesan Sekarang!</a>
                                        </div>
									</div>
								</div>
								<div class="col">
									<div class="card">
                                        <h5 class="section-title card-header mt-3">Tipe Superior</h5>
                                        <img src="assets/images/bas.jpg" class="card-img-top" alt="Los Angeles Skyscrapers"/>
                                        <div class="card-body">
                                            <h5 class="card-title">Fasilitas :</h5>
                                            <p class="card-text">
                                                Wifi 5G, Ac, 5 Kamar Tidur, 3 Kamar Mandi, 2 Dapur Besar, Ruang Keluarga, PS 4, Xbox, Pc Gaming, Member Card GYM & Kolah Renang, VVIP ROOM
                                            </p>
                                            <a href="#gmb" class="btn btn-success">Pesan Sekarang!</a>
                                        </div>
									</div>
								</div>								
							</div>
                        </div>
					</div>					
				</div>
			</div>

		</div>	
	</main>
	<?php include 'layout/footer.php';?>
