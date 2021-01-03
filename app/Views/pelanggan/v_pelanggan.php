<?= $this->extend('layout/pelanggan/v_peltemplate'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Daftar Produk</h1>
        </div><!-- /.col -->
      <div class="col-sm-6">
    </div><!-- /.col -->
  </div><!-- /.row -->
  </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container">

    <div class="row">

      <?php foreach($getProduk as $produk) : ?>
      <div class="col-md-3 mb-4">
        <div class="card h-100 card-pelanggan">
          <img src="<?= base_url('/img/'. $produk['foto_produk']); ?>" alt="<?= $produk['nama_produk']; ?>" class="img-pelanggan">
          <div class="card-body">
          <h2 class="card-title"><?= $produk['nama_produk']; ?></h2>
          <p class="card-text text-sm"><span class="badge badge-success"><?= $produk['kategori']; ?></span></p>
          <p class="card-text text-center text-bold">Rp<?= number_format($produk['harga_jual']); ?></p>
          </div>
          <div class="card-footer text-center pfooter">
          <a href="#" class="btn text-center btn-sm btn-outline-primary">Detail</a>
          <a href="#" class="btn btn-primary text-center btn-sm mt-1 mb-1"><i class="fa fa-plus"></i> Keranjang</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      
    </div><!-- Row -->

  </div>
</div>


</div>
  <!-- /.content-wrapper -->
<?= $this->endSection(); ?>