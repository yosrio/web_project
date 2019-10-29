
<div class="container">
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<div class="">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Tambah Surat Masuk</h1>
								</div>
								<hr>
								<form  method="post" action="<?= base_url('surat/tambahSuratMasuk'); ?>">
									<?= $this->session->flashdata('message'); ?>
									<p>
										<label>Tanggal Surat</label>
										<input class="w3-input" type="date" id="tgl_surat" name="tgl_surat" value="<?= set_value('tgl_surat') ?>">
									</p>

									<p>
										<label>Tujuan</label>
										<input class="w3-input" type="text" id="tujuan" name="tujuan" value="<?= set_value('tujuan') ?>">
									</p>

									<p>
										<label>Penerima</label>
										<input class="w3-input" type="text" id="penerima" name="penerima" value="<?= set_value('penerima') ?>">
									</p>
									<p>
										<label>Nomor Surat Masuk</label>
										<input class="w3-input" type="text" id="noSuratMasuk" name="noSuratMasuk" value="<?= set_value('noSuratMasuk') ?>">
									</p>

									<p>
										<label>Perihal</label>
										<input class="w3-input" type="text" id="perihal" name="perihal" value="<?= set_value('perihal') ?>">
									</p>
									<p>
										<label>Pengirim</label>
										<input class="w3-input" type="text" id="pengirim" name="pengirim" value="<?= set_value('pengirim') ?>">
									</p>
									<p>
										<label>Sifat Surat:</label>
										<input class="w3-radio" type="radio" id="sifatSurat" name="sifatSurat" value="Penting" checked>
										<label class="w3-validate">Penting</label>

										<input class="w3-radio" type="radio" id="sifatSurat" name="sifatSurat" value="Biasa">
										<label class="w3-validate">Biasa</label>

									</p>

									<div class="">
										<div class="card-body">
											<!-- <button type="submit" name="submit" value="Enter" class="w3-col w3-button w3-block w3-teal">SIMPAN</button> -->
											<!-- <a class="w3-col w3-button w3-block w3-red w3-margin-left" href="<?= base_url('surat'); ?>">BATAL</a> -->
											<button type="submit" name="submit" value="Enter" class="btn btn-facebook btn-user btn-block">
												SIMPAN
											</button>
											<a href="<?= base_url('surat'); ?>" class="btn btn-google btn-user btn-block">
												BATAL
											</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>