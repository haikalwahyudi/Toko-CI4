<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pembelian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Pembelian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pembelian</th>
                    <th>Pembeli</th>
                    <th>Produk</th>
                    <th>Tgl Pembelian</th>
                    <th>Ongkir</th>
                    <th>Total Pembelian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Trident</td>
                    <td>Internet</td>
                    <td>Win 95+</td>
                    <td>Win 95+</td>
                    <td>Win 95+</td>
                    <td>Win 95+</td>
                    <td>Win 95+</td>
                    <td><span class="badge badge-warning">Belum Lunas</span></td>
                    <td>
                    <a href="#" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                </tbody>
                </table>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>