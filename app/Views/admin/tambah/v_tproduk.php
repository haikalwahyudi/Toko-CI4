<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/produk') ?>">Produk</a></li>
              <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-auto" style="width: 47rem;">
            <div class="card-header text-center">
                Form Pengisian Data Produk
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="Nama Produk">Nama Produk</label>
                                <input type="text" name="namaProduk" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="Id Kategori">Kategori</label>
                                <select class="form-control" aria-label="Default select example" name="id_kategori">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="">Baju</option>
                                    <option value="">Elektronik</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Harga Beli">Harga Beli</label>
                                <input type="number" name="harga_beli" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="Harga Jual">Harga Jual</label>
                                <input type="number" name="harga_jual" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="Berat">Berat</label>
                                <input type="text" name="berat" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="Gambar">Gambar</label><br>
                                <input type="file" name="gambar">
                            </div>

                            <div class="form-group">
                                <textarea class="textarea" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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