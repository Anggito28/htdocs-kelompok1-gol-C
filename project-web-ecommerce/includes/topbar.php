<section class="header shadow-sm position-fixed">
    <div class="container-lg">
        <nav class="navbar py-2 navbar-expand-lg navbar-light bg-white justify-content-between">
            <a href="index.php" class="navbar-brand d-inline-flex">
                <img src="asset/logo/bonsai_1.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                <h5 class="ml-2 mt-2 font-weight-bold">Rudi Bonsai</h5>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav my-auto mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Info
                        </a>
                        <div class="dropdown-menu mb-4" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Tentang Kami</a>
                            <a class="dropdown-item" href="#">Kontak</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Pengiriman</a>
                            <a class="dropdown-item" href="#">Pembayaran</a>
                        </div>
                    </li>
                </ul>

                <div id="topbarCTA">
                    <a class="mr-4" href="#">
                        <i class="fa fa-shopping-cart fa-2x text-secondary"></i>
                        <!-- <span class="text">Keranjang</span> -->
                    </a>

                    <?php if (isset($_SESSION["login"])) : ?>
                        <!-- user loggged in -->
                        <div class="dropdown my-auto">
                            <a class="text-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle fa-2x"></i>
                            </a>
                            <div id="userMenu" style="width: 240px;" class="dropdown-menu dropdown-menu-right mt-3">
                                <p class="d-block pl-4 pt-2">
                                    <?= $_SESSION['email']; ?>
                                </p>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="profil.php?id=<?= $_SESSION['id']; ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Pembelian
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    <?php else : ?>
                        <a class="btn mx-1 btn-sm btn-outline-success my-2 my-sm-0" href="login.php">Masuk</a>
                        <a class="btn mx-1 btn-sm btn-success my-2 my-sm-0" href="register.php">Daftar</a>
                    <?php endif; ?>
                </div>

            </div>
        </nav>
    </div>
</section>