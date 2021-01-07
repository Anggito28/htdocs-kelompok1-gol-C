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
    <li id="sidebarDashboard" class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pesanan -->
    <li id="sidebarPesanan" class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePesanan" aria-expanded="true" aria-controls="CollapsePesanan">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Pesanan</span>
        </a>
        <div id="collapsePesanan" class="collapse" aria-labelledby="headingPesanan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">status pesanan</h6>
                <a id="dropdownSemuaPesanan" class="collapse-item" href="pesanan.php">Semua</a>
                <a id="dikonfirmasi" class="collapse-item" href="pesanan.php?status=dikonfirmasi">Dikonfirmasi</a>
                <a id="tertunda" class="collapse-item" href="pesanan.php?status=tertunda">Tertunda</a>
                <a id="menunggu" class="collapse-item" href="pesanan.php?status=menunggu">Menunggu</a>
                <a id="diproses" class="collapse-item" href="pesanan.php?status=diproses">Diproses</a>
                <a id="dikirim" class="collapse-item" href="pesanan.php?status=dikirim">Dikirim</a>
                <a id="selesai" class="collapse-item" href="pesanan.php?status=selesai">Selesai</a>
                <a id="batal" class="collapse-item" href="pesanan.php?status=batal">Batal</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Produk -->
    <li id="sidebarProduk" class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduk" aria-expanded="true" aria-controls="collapseProduk">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Produk</span>
        </a>
        <div id="collapseProduk" class="collapse" aria-labelledby="headingProduk" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">produk toko</h6>
                <a id="dropdownDaftarProduk" class="collapse-item" href="produk.php">Daftar Produk</a>
                <a id="dropdownTambahProduk" class="collapse-item" href="tambah-produk.php">Tambah Produk</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pelanggan -->
    <li id="sidebarPelanggan" class="nav-item">
        <a class="nav-link" href="pelanggan.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Pelanggan</span></a>
    </li>

    <!-- Nav Item - Laporan -->
    <li id="sidebarLaporan" class="nav-item">
        <a class="nav-link" href="laporan.php">
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