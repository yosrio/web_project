<?php foreach($karyawan as $k) : ?>
	<?php foreach($roleKaryawan as $r) : ?>
	<div class="container-fluid">
		<div class="card mb-3" style="max-width: 1000px;">
			<div class="row no-gutters">
				<div class="col-md-4">
					<a class="nav-link" href="<?= base_url('assets/img/profile/') . $user['image']; ?>"> <img src="<?= base_url('assets/img/profile/') .$user['image']; ?>" class="card-img" alt="..."> </a>
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<center>
							<h2 class="card-title"><?= $k['name'] ?></h2>
							<h4 class="card-text"><?= $k['email'] ?></h4>
							<h4 class="card-text"><?= $r['name']; ?></h4>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<?php endforeach; ?>