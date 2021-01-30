<?= $this->extend('layout/pelanggan/v_peltemplate'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Semua Transaksi</h1>
        </div><!-- /.col -->
      <div class="col-sm-6">
    </div><!-- /.col -->
  </div><!-- /.row -->
  </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container"><!-- container -->

        <div class="row">
            <div class="col-md-7 mx-auto">

                <?php
                // dd($cekTransaksi);
                if($cekTransaksi){
                    if($cekTransaksi->id_pembeli == session()->get('id_pelanggan')){
                ?>
                <!-- card -->
                <?php foreach ($getInvoice as $Invoice) {?>
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="idInvoice" value="<?= $Invoice['id_invoice']; ?>">
                        <div class="row">
                            <div class="col-md-4 text-bold">
                                Nomor Invoice
                            </div>
                            <div class="col-md-6">
                                <?= $Invoice['id_invoice'] ?>
                            </div>
                            <?php
                            if($Invoice['aksi'] == true){
                            ?>
                            <div class="col-md-2">
                                <a href="<?= base_url('/pelanggan/print/'.$Invoice['id_invoice']) ?>" class="float-right text-dark" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-bold">
                                Tanggal Pemesanan
                            </div>
                            <div class="col-md-8">
                                <?= $Invoice['tgl_beli'] ?>
                            </div>    
                        </div>
                        <hr>
                        <table id="example1" class="table table-sm table-striped mt-3">
                            <tbody>
                                <tr>
                                    <th>Status</th>
                                    <?php if($Invoice['aksi'] != true){ ?>
                                    <td><span class="badge badge-warning">Sedang Diprases</span></td>
                                <?php }else{ ?>
                                    <td><span class="badge badge-success">Berhasil</span></td>
                                <?php } ?>
                                </tr>
                                <tr>
                                    <th colspan="2">Toko Hikmah Masbagik</th>
                                </tr>
                                <tr>
                                    <?php
                                    $db = \Config\Database::connect();
                                    $total =0;
                                    $data = $db->table('pembelian')
                                        ->join('ongkir','ongkir.id_ongkir = pembelian.id_ongkir')
                                        ->getwhere(['id_invoice' => $Invoice['id_invoice']])->getResultArray();
                                        foreach ($data as $value) {
                                           $subtotal = $value['tarif'] + $value['total_pembelian'];
                                           $total += $subtotal;
                                       }

                                    ?>
                                    <th>Total Belanja</th>
                                    <td>Rp<?= number_format($total) ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Card End -->
            <?php
            }
        }
            }else{
            ?>
            
            <div class="alert alert-danger text-center">
                <h3>Opps, Belum ada transaksi yang dilakukan</h3>
            </div>
            <?php } ?>
            </div>
            
        </div>
        
    </div><!-- Container End -->

</div>
<!-- Content End -->


</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>