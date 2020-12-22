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
        <div class="card mx-auto" style="width: 47rem;">
            <div class="card-header text-center">
                Form Pengisian Data Admin
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" name="namaAdmin" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </form>
                        <div class="card-footer">
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection(); ?>