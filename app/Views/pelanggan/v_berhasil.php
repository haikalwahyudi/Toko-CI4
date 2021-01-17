<?= $this->extend('layout/pelanggan/v_peltemplate'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1 class="m-0 text-dark">Pembelian Berhasil</h1> -->
        </div><!-- /.col -->
      <div class="col-sm-6">
    </div><!-- /.col -->
  </div><!-- /.row -->
  </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<form action="<?= base_url('/pelanggan/addCheckout'); ?>" method="post"> <!-- Form End -->
<!-- Main content -->
<div class="content">
    <div class="container"><!-- container -->

<!-- Main content -->
<?php 
    if(session()->getFlashdata('sukses')) :
?>
<div class="alert alert-success">
    <?= session()->getFlashdata('sukses') ?>
</div>
<?php endif; ?>

<div class="row">
    <h1>Konfirmasi Pembayaran</h1>
</div>

<div class="row mt-5">
    <div class="col mt-5 text-center">
        <a href="#" class="btn btn-success btn-lg"><i class="fa fa-phone"></i> Whatsapp</a>
        <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-paper-plane"></i> Telegram</a>
        <a href="#" class="btn btn-danger btn-lg"><i class="fa fa-envelope"></i> Email</a>
    </div>    
</div>

    </div><!-- Container End -->
</div>
<!-- Content End -->
</form><!-- Form End --> 

</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>