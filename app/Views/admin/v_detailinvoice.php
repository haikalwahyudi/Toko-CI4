<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice Pemesanan Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('/admin/invoice') ?>">Invoice</a></li>
              <li class="breadcrumb-item active">Invoice Pembelian Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <h4>Nomor Invoice : <?= $idInvoice->id_invoice; ?> </h4>
              </div>
              <div class="col-6">
                <a href="<?= base_url('/admin/invoice') ?>" class="btn btn-primary float-right mb-1 btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
            </div>
            <table class="table table-stripped table-bordered">
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Tanggal Pembelian</th>
              <th>Harga Satuan</th>
              <th>Jumlah</th>
              <th>Ongkir</th>
              <th>Sub Total</th>
            </tr>
            <?php 
            $no=1;
            $total=0;
            foreach ($idPembelian as $pembelian) {
              $total = $pembelian['total_pembelian'] + $total = $pembelian['total_pembelian']
            ?>

            <tr>
              <td><?= $no++; ?></td>
              <td><?= $pembelian['nama_produk'] ?></td>
              <td><?= $pembelian['tgl_pembelian'] ?></td>
              <td><?= number_format($pembelian['harga']); ?></td>
              <td><?= $pembelian['jumlah'] ?></td>
              <td><?= number_format($pembelian['tarif']); ?></td>
              <td><?= number_format($pembelian['total_pembelian']); ?></td>
            </tr>
          <?php } ?>
            <tr>
              <th colspan="6" class="text-center">Total</th>
              <td><?= number_format($total); ?></td>
            </tr>
          </table>
          </div>
        </div>
    </section>
<?= $this->endSection(); ?>