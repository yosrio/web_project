<div class="container">

  <div class="card o-hidden border-1 my-5" style="max-width: 70%;">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Edit Akun</h1>
            </div>
            <hr>
            <form class="user" method="post" action="<?= base_url('user/editAkun'); ?>">
              <a class="text-gray mb-4">Personal</a>
              <p>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" value="<?= $user['name']; ?>" id="nama" name="nama" placeholder="Nama">
                  </div>
                  <div class="col-sm-6">
                    <input type="email" class="form-control form-control-user" value="<?= $user['email']; ?>" id="email" name="email" placeholder="Email Address">
                  </div>
                </div>

                <div>
                  <img src="<?= base_url('assets/img/profile/') .$user['image']; ?>" class="card-img" alt="..." style="height: 100px; width: 120px;">
                  Upload Foto : 
                  <input type="file" id="file" name="file">
                  <p>
                    <small style="color: red">*Format file *.JPG, *.PNG dan ukuran maksimal file 1 MB!</small>
                </div>
                <hr>
                <a class="text-gray mb-4">Password</a>
                <p>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="oldPassword" name="oldPassword" placeholder="Old Password">
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control form-control-user" id="newPassword" name="newPassword" placeholder="New Password">
                    </div>
                    <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user" id="newRepeatPassword" name="newRepeatPassword" placeholder="Repeat New Password">
                    </div>
                  </div>

                  <hr>
                  <a href="login.html" class="btn btn-primary btn-user btn-block">
                    Simpan Perubahan
                  </a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>