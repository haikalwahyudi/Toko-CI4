<?= $this->extend('layout/v_template'); ?>

<?= $this->section('isi'); ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pelanggan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Home</a></li>
              <li class="breadcrumb-item active">Pelanggan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
            <?php if(session()->getFlashdata('sukses')){ ?>
              <div class="alert alert-success">
                <?= session()->getFlashdata('sukses'); ?>
              </div>
            <?php }else if(session()->getFlashdata('hapus')){ ?>
              <div class="alert alert-danger">
                <?= session()->getFlashdata('hapus'); ?>
              </div>
            <?php }; ?>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Teplpon</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach($getPelanggan as $pelanggan) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $pelanggan['nama_pelanggan']; ?></td>
                    <td><?= $pelanggan['email_pelanggan']; ?></td>
                    <td><?= $pelanggan['password_pelanggan']; ?></td>
                    <td><?= $pelanggan['telpon_pelanggan']; ?></td>
                    <td>
                    <a href="<?= base_Url('admin/ubahPelanggan/'.$pelanggan['id_pelanggan']); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="<?= base_Url('admin/hapusPelanggan/'.$pelanggan['id_pelanggan']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?? \n Data yang sudah dihapus tidak bisa dikembalikan')"><i class="fa fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>