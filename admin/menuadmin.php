<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Izu Toko Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="home.php">data barang <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="pembelian.php">Data pembelian</a>
                <a class="nav-item nav-link" href="akun_yang_ada.php">akun pelanggan terdaftar</a>
                <?php if (empty($_SESSION['admin']) or !isset($_SESSION['admin'])) : ?>
                    <a class="nav-item nav-link" href="loginadmin.php">login</a>
                <?php else : ?>
                    <a class="nav-item nav-link" href="logout.php">logout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>