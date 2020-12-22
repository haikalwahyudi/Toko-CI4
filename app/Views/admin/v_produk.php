<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('/admin/tambahProduk'); ?>" class=" btn btn-outline-primary"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Internet</td>
                    <td>Win 95+</td>
                    <td>Win 95+</td>
                    <td>Trident</td>
                    <td>Internet</td>
                    <td>
                    <a href="#" class="btn btn-primary">Detail</a> ||
                    <a href="#" class="btn btn-warning"><i class="fa fa-edit"></i></a> ||
                    <a href="#" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                </td>
                </tr>
                </tbody>
                </table>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>