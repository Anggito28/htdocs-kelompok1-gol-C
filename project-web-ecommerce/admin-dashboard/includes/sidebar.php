<!-- Sidebar -->
<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <!-- <img src="./img/logo-dashboard.svg" width="30" height="30" alt="" loading="lazy"> -->
            <i class="fas fa-fw fa-seedling"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Rudi Bonsai</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($page == "dashboard") echo "active" ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pesanan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Pesanan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Status Pesanan:</h6>
                <a class="collapse-item" href="#">Semua</a>
                <a class="collapse-item" href="#">Tertunda</a>
                <a class="collapse-item" href="#">Diproses</a>
                <a class="collapse-item" href="#">Dikirim</a>
                <a class="collapse-item" href="#">Selesai</a>
                <a class="collapse-item" href="#">Batal</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Produk -->
    <li class="nav-item <?php if ($page == "produk") echo "active" ?>">
        <a class="nav-link" href="produk.php">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Produk</span></a>
    </li>

    <!-- Nav Item - Pelanggan -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Pelanggan</span></a>
    </li>

    <!-- Nav Item - Laporan -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-book"></i>
            <span>Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->