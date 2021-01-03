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
            <?php if(session()->getFlashdata('hapus')) : ?>
              <div class="alert alert-danger">
                <?= session()->getFlashdata('hapus'); ?>
              </div>
            <?php endif; ?>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
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
                <?php 
                $no = 1;
                foreach($getPembelian as $pembelian) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pembelian['nama_pelanggan']; ?></td>
                    <td><?= $pembelian['nama_produk']; ?></td>
                    <td><?= $pembelian['tgl_pembelian']; ?></td>
                    <td><?= number_format($pembelian['tarif']); ?></td>
                    <td><?= number_format($pembelian['total_pembelian']); ?></td>
                    <td><span class="badge badge-warning">Belum Lunas</span></td>
                    <td>
                    <a href="#" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                    <a href="<?= base_url('/admin/hapusPembelian/'.$pembelian['id_pembelian']); ?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>