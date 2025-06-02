<?php include('include/navbar.php'); include('include/koneksi.php')?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Us</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body style="padding: 70px;">
        <div class="container my-5">
            <h2>List Makanan/Minuman di Kantin</h2>

            <?php
            // Ambil daftar penjual unik dari database
            $penjualQuery = mysqli_query($conn, "SELECT DISTINCT penjual FROM menu");
  
            while ($penjualRow = mysqli_fetch_assoc($penjualQuery)) {
                $penjual = $penjualRow['penjual'];
                echo "<h3>Kantin: " . htmlspecialchars($penjual) . "</h3>";

                // Ambil menu yang hanya milik penjual tersebut
                $menuQuery = mysqli_query($conn, "SELECT * FROM menu WHERE penjual = '" . mysqli_real_escape_string($conn, $penjual) . "'");
                echo '<div class="row">';
      
            while ($menuRow = mysqli_fetch_assoc($menuQuery)) {
            ?>

            <!--Menu-->

            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="asset/<?php echo htmlspecialchars($menuRow['gambar']); ?>" class="card-img-top" alt="..." width="320" height="320">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($menuRow['nama']); ?></h5>
                        <p>Harga: Rp <?php echo number_format($menuRow['harga'],0,',','.'); ?> - Stok: <?php echo (int)$menuRow['stok']; ?></p>
                    </div>
                </div>
            </div>
            <?php
                }
                echo '</div>'; // row
            }
            ?>
        </div>
    </body>
</html>