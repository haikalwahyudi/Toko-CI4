<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Ongkir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/ongkir') ?>">Ongkir</a></li>
              <li class="breadcrumb-item active">Tambah Data Ongkir</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-auto" style="width: 47rem;">
            <div class="card-header text-center">
                Form Pengisian Data Ongkir
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="Nama Kota">Nama Kota</label>
                                <input type="text" name="nama_kota" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="Tarif">Tarif</label>
                                <input type="number" name="tarif" class="form-control">
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