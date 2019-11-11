
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
									<h1 class="h4 text-gray-900 mb-4">Tambah Surat Keluar</h1>
								</div>
								<hr>
								<form  method="post" action="<?= base_url('surat/tambahSuratKeluar'); ?>">
									<?= $this->session->flashdata('message'); ?>
									<p>
										<label>Nama Perusahaan</label>
										<input class="w3-input" type="text" id="namaPerusahaan" name="namaPerusahaan" value="<?= set_value('namaPerusahaan') ?>">
									</p>

									<p>
										<label>Penanggungjawab</label>
										<input class="w3-input" type="text" id="pj" name="pj" value="<?= set_value('pj') ?>">
									</p>

									<p>
										<label>Tanggal Dikirim</label>
										<input class="w3-input" type="date" id="tgl_kirim" name="tgl_kirim" value="<?= set_value('tgl_kirim') ?>">
									</p>

									<p>
										<label>Tanggal Harus Sampai</label>
										<input class="w3-input" type="date" id="tgl_sampai" name="tgl_sampai" value="<?= set_value('tgl_sampai') ?>">
									</p>

									<p>
										<label>Biaya Ongkos</label>
										<input class="w3-input" type="text" id="biaya" name="biaya" value="<?= set_value('biaya') ?>">
									</p>

									<div>
										<div class="card-body">
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