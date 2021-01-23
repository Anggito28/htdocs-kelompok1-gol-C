<section class="header shadow-sm position-fixed">
    <div class="container-lg">
        <nav class="navbar py-2 px-0 navbar-expand-lg navbar-light bg-white justify-content-between">
            <a href="index.php" class="navbar-brand d-inline-flex">
                <img src="img/logo/bonsai_1.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                <h5 class="ml-2 mt-2 font-weight-bold">Rudi Bonsai</h5>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav my-auto mr-auto">
                    <li id="topbarHome" class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li id="topbarProduk" class="nav-item">
                        <a class="nav-link" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="topbarInfo" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Info
                        </a>
                        <div class="dropdown-menu mb-4" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="tentang-kami.php">Tentang Kami</a>
                            <a class="dropdown-item" href="kontak.php">Kontak</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="pengiriman.php">Pengiriman</a>
                            <a class="dropdown-item" href="pembayaran.php">Pembayaran</a>
                        </div>
                    </li>
                </ul>

                <div id="topbarCTA">
                    <div class="d-flex justify-content-between">
                        <?php if (isset($_SESSION['login'])) : ?>
                            <?php
                            require_once "config/connect.php";
                            require_once "config/function.php";

                            $kdAkun = $_SESSION['id'];
                            $kdPembeli = query("SELECT kd_pembeli FROM tb_pembeli WHERE kd_akun = $kdAkun")[0]["kd_pembeli"];
                            ?>

                            <h5 class="my-auto mr-2">(<?= count(query("SELECT id FROM tb_keranjang WHERE kd_pembeli = $kdPembeli AND id_produk IS NOT NULL")); ?>)</h5>
                            <a class="mr-4 my-auto" href="keranjang.php">
                                <i class="fa fa-shopping-cart fa-2x text-secondary"></i>
                            </a>
                        <?php else : ?>
                            <a class="mr-4 my-auto" onclick="alert('Harap Login dahulu untuk dapat melakukan transaksi');location.replace('login.php')">
                                <i class="fa fa-shopping-cart fa-2x text-secondary"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php if (isset($_SESSION["login"])) : ?>
                        <!-- user loggged in -->
                        <div class="dropdown">
                            <a class="text-secondary my-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if ($_SESSION['profil-pic'] == "empty") : ?>
                                    <i class="fa fa-user-circle fa-2x"></i>
                                <?php else : ?>
                                    <div style="width: 34px; height: 34px; border-radius: 50%; border: 1px solid black;" class="embed-responsive embed-responsive-1by1">
                                        <img style="object-fit: cover;" class="bg-light embed-responsive-item " src="img/profile-picture/<?= $_SESSION['profil-pic']; ?>" alt="">
                                    </div>
                                <?php endif; ?>
                            </a>
                            <div style="width: 260px;" id="userMenu" class="shadow dropdown-menu dropdown-menu-right mt-2">
                                <p class="d-block pl-4 pt-2 text-truncate" style="max-width: 200px;">
                                    <?= htmlspecialchars($_SESSION['nama']); ?>
                                </p>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="profil.php?tab=1">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil Pengguna
                                </a>
                                <a class="dropdown-item" href="transaksi.php">
                                    <i class="fas fa-shopping-bag fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Transaksi
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div>
                            <a class="btn mx-1 btn-sm btn-outline-success my-2 my-sm-0" href="login.php">Masuk</a>
                            <a class="btn mx-1 btn-sm btn-success my-2 my-sm-0" href="register.php">Daftar</a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </nav>
    </div>
</section>