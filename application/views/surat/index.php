        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

          <main>
            <!-- container START -->
            <div class="container">
              <?php if ($role['id'] == '1'): ?>
                Transaksi Surat: 
                <p>
                  <a href="<?= base_url('surat/tambahSuratMasuk'); ?>" class="btn btn-success" role="button">Surat Masuk</a>
                  <a href="#" class="btn btn-info" role="button">Surat Keluar</a>
                </p>
                <!-- <hr class="sidebar-divider"> -->
                <br>
              <?php endif; ?>
              <h3>Informasi Surat:</h3>
              <div class="col s12 m4">
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="<?= base_url('assets/img/inbox.png'); ?>" style="position: center;">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Jumlah Surat Masuk</h5>
                        <?php if ($role['id'] == '1'): ?>
                          <p class="card-text"> <?= $counts3; ?> Surat Masuk</p>
                          <?php else: ?>
                            <p class="card-text"> <?= $counts; ?> Surat Masuk</p>
                        <?php endif; ?>
                        <a class="card-text btn btn-info" href="<?= base_url('surat/lihatSurat'); ?>""> Lihat </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col s12 m4">
                <div class="card mb-3" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="<?= base_url('assets/img/outbox.png'); ?>" style="position: center;">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Jumlah Surat Keluar</h5>
                        <p class="card-text">0 Surat Masuk</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- container END -->

          </main>
          <!-- Main END -->

        </div>
        <!-- /.container-fluid -->

            <!-- End of Main Content -->