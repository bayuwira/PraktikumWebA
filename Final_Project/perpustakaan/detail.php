<div class="main-kiri">
    <div class="main-kiri">
        <?php
        echo kategori($kategori_id);
        ?>
    </div>
</div>
<div class="main-kanan">
    <?php 
        $barang_id = $_GET["barang_id"];
        $query = mysqli_query($conn, "SELECT * FROM barang WHERE barang_id = '$barang_id' AND status = 'on'");
        $row = mysqli_fetch_assoc($query);

        echo "
            <div calss='detail-barang'>
                <h2>$row[nama_barang]</h2>
                <div class='frame-gambar'>
                    <img src='".BASE_URL."images/barang/$row[gambar]' >
                </div>
                <div class='frame-harga'>
                    <span>".rupiah($row['harga']). "</span>
                    <a href='" . BASE_URL . "tambah_keranjang.php?barang_id=$row[barang_id]'>+ add to cart</a>
                </div>
                <div class='keterangan'>
                    <b>Deskripsi : </b> <br> $row[spesifikasi]
                </div>
            </div>
        ";
    ?>
</div>