<?php foreach($karyawan as $k) : ?>
	<div class="container-fluid">
		<div class="card mb-3" style="max-width: 1000px;">
			<?php if($k['role'] != 'Admin'): ?>
				<form method="post" action="<?= base_url('user/hapusAkun'); ?>">
					<button class="btn btn-danger btn-user " type="submit" value="<?= $k['user_id'] ?>" id="hapusId" name="hapusId" style="max-width: 20%;"> Hapus </button>
				</form>
			<?php endif;?>
			<div class="row no-gutters">
				<div class="col-md-4">
					<img src="<?= base_url('assets/img/profile/') .$user['image']; ?>" class="card-img" alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<center>
							<h2 class="card-title"><?= $k['name'] ?></h2>
							<h4 class="card-text"><?= $k['email'] ?></h4>
							<h4 class="card-text"><?= $k['role']; ?></h4>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>