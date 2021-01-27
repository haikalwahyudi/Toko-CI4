<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>/template/index3.html" class="brand-link">
      <img src="<?= base_url() ?>/img/logo/logo.png"
          alt="Toko Hikmah"
          class="">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
  
          <li class="nav-header">MENU</li>

        <li class="nav-item">
            <a href="<?= base_url('/admin/index'); ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
                <p>
                Beranda
                </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="<?= base_url('/admin/produk'); ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
                <p>
                Produk
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?= base_url('/admin/invoice'); ?>" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                Invoice Pemesana
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Akun
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="<?= base_url('/admin/admin'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
                <p>
                Admin
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/admin/pelanggan'); ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
                <p>
                Pelanggan
                </p>
            </a>
        </li>
            </ul>
        
        <li class="nav-item">
            <a href="<?= base_url('/admin/kategori'); ?>" class="nav-link">
            <i class="nav-icon fas fa-cookie"></i>
                <p>
                Kategori
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('/admin/ongkir'); ?>" class="nav-link">
            <i class="nav-icon fas fa-money-bill-alt"></i>
                <p>
                Ongkir
                </p>
            </a>
        </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>