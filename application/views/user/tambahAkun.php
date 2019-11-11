<div class="container">

  <div class="card o-hidden border-1 my-5" style="max-width: 70%;">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Tambah Akun</h1>
            </div>
            <hr>
            <form class="user" method="post" action="<?= base_url('user/tambahAkun'); ?>">
              <?= $this->session->flashdata('message'); ?>
              <a class="text-gray mb-4">Personal</a>
              <p>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama">
                  </div>
                  <div class="col-sm-6">
                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                  </div>
                </div>

                <a class="text-gray mb-4">Password</a>
                <p>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    </div>
                    <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Divisi:</label>
                    <select class="dropdown" id="role_id" name="role_id">
                      <option value="1">Admin</option>
                      <option value="2">Direktur Operasional</option>
                    </select>
                  </div>
                  <hr>
                  <button class="btn btn-primary btn-user btn-block">
                    Tambah Akun
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>