<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<div class="row">
					<div style="max-width: 60%;" class="w3-col">
						<form method="post" action="<?= base_url('surat/lihatSuratMasuk')?>">
							<select id="filter" name="filter" style="height: 37px;">
								<option value="1">Semua</option>
								<?php if($role['role'] == 'Keuangan'): ?>
									<option value="2">Belum Konfirmasi</option>
									<option value="3" selected>Sudah Konfirmasi</option>
									<?php else: ?>
										<option value="2" selected>Belum Konfirmasi</option>
										<option value="3">Sudah Konfirmasi</option>
									<?php endif;?>
								</select>
								<button type="submit" class="w3-btn w3-teal w3-round-large">Show</button>
							</form>
						</div>
						<br>
						<thead>
							<tr style="text-align: center;">
								<th scope="col">No</th>
								<th scope="col">No Surat Masuk</th>
								<th scope="col">Pengirim</th>
								<th scope="col">Tujuan Surat</th>
								<th scope="col">Perihal</th>
								<th scope="col">Tanggal Masuk</th>
								<th scope="col">Penerima</th>
								<?php if ($role['role'] == 'Admin'): ?>
									<th scope="col">Disposisi</th>
									<th scope="col">Status</th>
									<?php else: ?>
										<th scope="col">Sifat Surat</th>
										<th scope="col">Status</th>
									<?php endif; ?>
									<th scope="col">Cetak</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($role['id'] == '1'): ?>
									<?php $i = 1; ?>
									<?php foreach($menu2 as $sm) : ?>
										<tr>
											<th scope="row"><?= $i; ?></th>
											<td><?= $sm['no_surat_masuk']; ?></td>
											<td><?= $sm['pengirim']; ?></td>
											<td><?= $sm['tujuan']; ?></td>
											<td><?= $sm['perihal']; ?></td>
											<td><?= $sm['tanggal_masuk']; ?></td>
											<td><?= $sm['penerima']; ?></td>
											<td><?= $sm['disposisi']; ?></td>
											<td><?= $sm['status']; ?></td>
											<?php if (!empty($sm['disposisi'])): ?>
												<td>
													<form method="post" action="<?= base_url('surat/laporan')?>">
														<button type="w3-input" name="noUrut" id="noUrut" value="<?= $sm['no_urut']; ?>" class="w3-button w3-teal">print PDF</button>
													</form>
												</td>
												<?php else: ?>
													<td> </td>
												<?php endif; ?>
											</tr>
											<?php $i++; ?>
										<?php endforeach; ?>
										<?php else: ?>
											<?php $i = 1; ?>
											<?php foreach($menu as $sm) : ?>
												<?php if (empty($sm['disposisi'])): ?>
													<?php $a = $sm['no_urut']; ?>
													<?php if ($sm['sifat_surat'] == 'Penting'): ?>
														<tr style="background-color: red; color: white;">
															<?php else: ?>
																<tr>
																<?php endif ?>
																<th scope="row"><?= $i; ?></th>
																<td><?= $sm['no_surat_masuk']; ?></td>
																<td><?= $sm['pengirim']; ?></td>
																<td><?= $sm['tujuan']; ?></td>
																<td><?= $sm['perihal']; ?></td>
																<td><?= $sm['sifat_surat']; ?></td>
																<td><?= $sm['status']; ?></td>
																<td>
																	<a onclick="document.getElementById('id0<?= $i; ?>').style.display='block'"  class="w3-button w3-teal">Konfirmasi</a>
																	<div id="id0<?= $i; ?>" class="w3-modal w3-animate-opacity">
																		<div class="w3-modal-content w3-card-4" style="max-width: 50%">
																			<span onclick="document.getElementById('id0<?= $i; ?>').style.display='none'" class="w3-button w3-large w3-display-topright w3-red">&times;</span>
																			<form method="post" action="<?= base_url('surat/disposisi')?>">
																				<input type="text" name="noUrut" id="noUrut" value="<?= $a; ?>" hidden="">
																				<div class="w3-container">
																					<br>
																					<label>Keterangan</label>
																					<textarea class="w3-input w3-border" id="keterangan" name="keterangan" rows="4" cols="20"></textarea>
																				</div>
																				<br>
																				<div class="col w3-container">
																					<select class="w3-select" name="status" id="status" style="max-width: 15%">
																						<option value="" disabled selected>Konfirmasi</option>
																						<option value="terima">Terima</option>
																						<option value="tolak">Tolak</option>
																					</select>
																				</div>
																				<hr>
																				<div class="col w3-container">
																					<button type="submit" name="submit" value="Enter" class="w3-col w3-button w3-block w3-teal" style="max-width:25%" >SIMPAN</button>
																				</div>
																			</form>
																			<br>
																		</div>
																	</td>
																</tr>
																<?php $i++; ?>
																<?php else: ?>
																	<tr>
																		<th scope="row"><?= $i; ?></th>
																		<td><?= $sm['no_surat_masuk']; ?></td>
																		<td><?= $sm['pengirim']; ?></td>
																		<td><?= $sm['tujuan']; ?></td>
																		<td><?= $sm['perihal']; ?></td>
																		<td><?= $sm['sifat_surat']; ?></td>
																		<td><?= $sm['status']; ?></td>
																	</tr>
																<?php endif ?>
															<?php endforeach; ?>
														<?php endif ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
