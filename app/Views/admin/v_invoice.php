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
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
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
                    <th width="30px">No Invoice</th>
                    <th>Nama Pemesan</th>
                    <th>No Telpon</th>
                    <th>Tgl Pemesanan</th>
                    <th>Batas Pembayaran</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($getInvoice as $invoice) : ?>
                <tr>
                    <td><?= $invoice['id_invoice']; ?></td>
                    <td><?= $invoice['nama_pem']; ?></td>
                    <td><?= $invoice['telpon']; ?></td>
                    <td><?= $invoice['tgl_beli']; ?></td>
                    <td><?= $invoice['batas_bayar']; ?></td>
                    <td><?= $invoice['alamat']; ?></td>
                    <td><div class="badge badge-warning">Belum Lunas</div></td>
                    <td>
                      <a href="<?= base_url('/admin/detailInvoice/'.$invoice['id_invoice']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                      <a href="" class="btn btn-success btn-sm mt-1 mb-1"><i class="fa fa-check"></i></a>
                      <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>