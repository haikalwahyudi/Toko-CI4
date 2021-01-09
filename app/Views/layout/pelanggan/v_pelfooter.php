 <!-- Main Footer -->
<footer class="main-footer text-center">
    <strong>Copyright &copy; <?= date('Y'); ?></strong> Haikal Wahyudi.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/template/assets/js/adminlte.min.js"></script>
<!-- Alert -->
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>/template/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>/template/plugins/toastr/toastr.min.js"></script>

<script>
    //Notifikasi Toast
  function pesan($warna,$pesan){
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    switch($warna){
      case "1":
        toastr.success($pesan);
        break;
      case "2":
        toastr.warning($pesan);
        break;
      default:
        toastr.error($pesan);

    }
      
  }
</script>
<?php if(session()->getFlashdata('sukses')){ ?>
    <script>
      pesan('1','<?= session()->getFlashdata('sukses'); ?>');
    </script>
<?php }else if(session()->getFlashdata('ubah')){?>
    <script>
      pesan('2','<?= session()->getFlashdata('ubah'); ?>');
    </script>
<?php }else if(session()->getFlashdata('hapus')){?>
    <script>
      pesan('3','<?= session()->getFlashdata('hapus'); ?>');
    </script>
  <?php } ?>
</body>
</html>
