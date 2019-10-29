<div class="container login-container">
  <div class="row justify-content-center">
    <div class="col-md-6 login-form-2" style="background:rgba(0,0,0,0.2);">
      <h3>Registration</h3>
      <?= $this->session->flashdata('message'); ?>
      <form method="post" action="<?= base_url('auth/registration'); ?>">
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
          <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
          <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
        <div class="form-group">
         <select class="dropdown" id="role_id" name="role_id">
          <option value="1">Admin</option>
          <option value="2">Direktur</option>
        </select>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
          <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
        <div class="col-sm-6">
          <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-user btn-block">
        Register Account
      </button>
    </form>
  </div>
</div>
</div>