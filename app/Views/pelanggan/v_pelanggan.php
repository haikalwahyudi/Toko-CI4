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

        <form action="<?= base_url('/pelanggan/addCart'); ?>" method="post">
        <input type="hidden" name="id" value="<?= $produk['id_produk']; ?>">
        <input type="hidden" name="name" value="<?= $produk['nama_produk']; ?>">
        <input type="hidden" name="price" value="<?= $produk['harga_jual']; ?>">
        <!-- Options -->
        <input type="hidden" name="berat" value="<?= $produk['berat']; ?>">
        <input type="hidden" name="foto_produk" value="<?= $produk['foto_produk']; ?>">

          <img src="<?= base_url('/img/'. $produk['foto_produk']); ?>" alt="<?= $produk['nama_produk']; ?>" class="img-pelanggan">
          <div class="card-body">
          <h2 class="card-title"><?= $produk['nama_produk']; ?></h2>
          <p class="card-text text-sm"><span class="badge badge-success"><?= $produk['kategori']; ?></span></p>
          <p class="card-text text-center text-bold">Rp<?= number_format($produk['harga_jual']); ?></p>
          </div>
          <div class="card-footer text-center pfooter">
          <a href="#" class="btn text-center btn-sm btn-outline-primary">Detail</a>
          <?php if(session()->get('log_in') != true) : ?>
          <button type="submit" name="keranjang" class="btn btn-primary mt-1 mb-1 btn-sm">
          <i class="fa fa-cart-plus"></i> Keranjang</button>
          <?php endif; ?>
          </div>
        </form>
        </div>
      </div>
      <?php endforeach; ?>
      
    </div><!-- Row -->

  </div>
</div>


</div>
  <!-- /.content-wrapper -->
<?= $this->endSection(); ?>