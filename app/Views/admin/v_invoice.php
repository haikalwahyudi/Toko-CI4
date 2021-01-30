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
          <div class="card-header">
            <a href="<?= base_url('/pdf/cetakPdf'); ?>" target="_balnk" class="btn btn-primary"><i class="fa fa-file"></i> Cetak ke PDF</a>
          </div>
          <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="30px">No</th>
                    <th>No.Invoice</th>
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
                    <td><?= $no++; ?></td>
                    <td><?= 'INV/'.$invoice['id_invoice']; ?></td>
                    <td><?= $invoice['nama_pem']; ?></td>
                    <td><?= $invoice['telpon']; ?></td>
                    <td><?= $invoice['tgl_beli']; ?></td>
                    <td><?= $invoice['batas_bayar']; ?></td>
                    <td><?= $invoice['alamat']; ?></td>
                    <?php if($invoice['aksi'] != true){ ?>
                    <td><div class="badge badge-warning">Belum Lunas</div></td>
                  <?php }else{ ?>
                    <td><div class="badge badge-success">Lunas</div></td>
                  <?php } ?>
                    <td width="30px">
                      <a href="<?= base_url('/admin/detailInvoice/'.$invoice['id_invoice']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>

                      <?php if($invoice['aksi'] != true){ ?>
                      <a href="<?= base_url('/admin/updateStatus/'.$invoice['id_invoice']); ?>" class="btn btn-success btn-sm mt-1 mb-1"><i class="fa fa-check"></i></a>
                      <a href="<?= base_url('/admin/hapusInvoice/'.$invoice['id_invoice']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin membatalkan pesanan ini?')" title="Batalkan Pesanan"><i class="fa fa-times-circle"></i></a>
                    <?php } ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>