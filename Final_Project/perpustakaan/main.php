<div class="main-kiri">
    <?php 
        echo kategori($kategori_id);
    ?>
</div>
<div class="main-kanan">
    <div id="slides">
        <?php
            $banner = mysqli_query($conn, "SELECT * from banner WHERE status = 'on' ORDER BY banner_id DESC LIMIT 3");
            while ($row = mysqli_fetch_assoc($banner)) {
                echo "
                    <a href='" . BASE_URL . "$row[link]'><img src='" . BASE_URL . "images/slide/$row[gambar]'></a>
                ";
            }
        ?>
    </div>
    <div class="frame-barang">
        <ul>
            <?php 
                if($kategori_id){
                    $query = mysqli_query($conn, "SELECT * from barang WHERE status = 'on' AND kategori_id='$kategori_id'");
                }else{
                    $query = mysqli_query($conn, "SELECT * from barang WHERE status = 'on'");
                }
                
                $no = 1;
                while($row = mysqli_fetch_assoc($query)){
                    $style=false;
                    if($no % 3 == 0){
                        $style="style='margin-right:0px'";
                    }
                    echo "
                        <li $style>
                            <p class='price'>".rupiah($row["harga"])."</p>
                            <a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'><img src='".BASE_URL."images/barang/$row[gambar]'></a>
                            <div class='keterangan-gambar'>
                                <p><a href='" . BASE_URL . "index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a></p>
                                <span>Stok : $row[stok]</span>
                            </div>
                            <div class='button-add-cart'>
                                <a href='" . BASE_URL . "tambah_keranjang.php?barang_id=$row[barang_id]'>+ pinjam</a>
                            </div>
                        </li>
                    ";
                    $no++;
                }
            ?>
        </ul>
    </div>
</div>