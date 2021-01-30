<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $title; ?></title>

  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/adminlte.min.css">
  
  <style type="text/css">
      table .tr1{
        background-color: #F2F3F4;
      }
      td, th{
        padding: 8px;
      }
  </style>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
<!-- ================================================================================ -->
<div class="content">
    <div class="container"><!-- container -->

        <div class="row">
            <div class="col-md-7 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <CENTER>
                            <h5>TOKO HIKMAH</h5>
                            <P>Invoice ini merupakan bukti pembayaran yang sah dari Toko Hikmah.</P>
                        </CENTER><br>
                        <div class="row">
                            <div class="col-md-4 text-bold">
                                Nomor Invoice
                            </div>
                            <div class="col-md-8">
                                <?= $Invoice['id_invoice'] ?>
                            </div>  
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
                        <table width="100%">
                                <tr class="tr1">
                                    <th width="330px">Status</th>
                                    <?php if($Invoice['aksi'] != true){ ?>
                                    <td><span class="badge badge-warning">Sedang Diprases</span></td>
                                <?php }else{ ?>
                                    <td><span class="badge badge-success">Berhasil</span></td>
                                <?php } ?>
                                </tr>
                                <tr>
                                    <th colspan="2">Toko Hikmah Masbagik</th>
                                </tr>
                                <tr class="tr1">
                                    <th>Total Belanja</th>
                                    <?php 
                                    $total = 0;
                                    foreach ($Tblanja as $value) {
                                       $subtotal = $value['tarif'] + $value['total_pembelian'];
                                       $total += $subtotal;
                                    } ?>
                                    <td>Rp<?= number_format($total); ?></td>
                                
                                </tr>
                        </table>
                    </div>
                </div>
                <!-- Card End -->
            </div>
            
        </div>
    </div><!-- Container End -->

</div>
<!-- Content End -->


</div>
<!-- /.content-wrapper -->
<!-- ==================================================================================== -->
<script type="text/javascript">
print();
onmousemove = function() {
    close();
}
</script>
</body>
</html>
