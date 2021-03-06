<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Icon -->
  <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/logo/icon.png">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="<?= base_url(); ?>/img/logo/logo.png" alt="Logo Toko Hikmah">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <?php if(session()->getFlashdata('gagal')) : ?>
      <div class="alert alert-warning">
        <?= session()->getFlashdata('gagal'); ?>
      </div>
    <?php endif; ?>
      <!-- <p class="login-box-msg">Silahkan Login</p> -->

      <form action="<?= base_url('/Login/cekLoginPelanggan'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" value="<?= old('email'); ?>"
           class="form-control <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <div class="invalid-feedback">
            <?= $validation->getError('email'); ?>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value="<?= old('password'); ?>"
          class="form-control <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="invalid-feedback">
            <?= $validation->getError('password'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="<?= base_url('/pelanggan'); ?>" class="btn btn-warning text-white">Batal</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3">
        Belum punya akun? Ayo <a href="/Login/registrasiUser" class="text-bold">Daftar</a> 
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/template/dist/js/adminlte.min.js"></script>

</body>
</html>
