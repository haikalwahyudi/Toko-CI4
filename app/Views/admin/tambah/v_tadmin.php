<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/admin') ?>">Admin</a></li>
              <li class="breadcrumb-item active">Tambah Data Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-auto" style="width: 70%;">
            <div class="card-header text-center">
                Form Pengisian Data Admin
            </div>
            <div class="card-body">
                <?php if(session()->getFlashdata('sukses')){ ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('sukses'); ?>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col">
                        <form action="<?= base_url('admin/tambahAdminAksi'); ?>" method="post">
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" name="namaAdmin" class="form-control
                                <?= ($validation->hasError('namaAdmin') ? 'is-invalid' : ''); ?>" autofocus value="<?= old('namaAdmin'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namaAdmin'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" name="username" class="form-control
                                <?= ($validation->hasError('username') ? 'is-invalid' : ''); ?>" value="<?= old('username'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control
                                <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" value="<?= old('password'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('/admin/admin'); ?>" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection(); ?>