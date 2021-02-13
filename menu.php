<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Izu Toko</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="tampilbelanja.php">Keranjang Saya</a>
                <?php if (empty($_SESSION['pelanggan'])) :  ?>
                    <a class="nav-item nav-link" href="login.php">login</a>
                <?php else : ?>
                    <a class="nav-item nav-link" href="logout.php">logout</a>
                <?php endif; ?>
                <a class="nav-item nav-link" href="riwayat.php">riwayat belanja</a>
            </div>
        </div>
    </div>
</nav>