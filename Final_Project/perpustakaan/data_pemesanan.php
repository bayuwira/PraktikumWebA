<?php
if ($user_id == false) {
    $_SESSION["proses_pesanan"] = true;
    header("Location: " . BASE_URL . "index.php?page=login");
    exit;
}
?>

<div class="frame-data-pengiriman">
    <h3 class="label-data">Data Peminjam</h3>
    <div class="frame-form-pengiriman">
        <form action="<?php echo BASE_URL . "proses_pemesanan.php" ?>" method="post">
            <div class="element-form">
                <label for="">Nama Penerima</label>
                <span><input type="text" name="nama_penerima"></span>
            </div>
            <div class="element-form">
                <label for="">Nomor Telepon</label>
                <span><input type="text" name="nomor_telepon"></span>
            </div>
            <div class="element-form">
                <label for="">Alamat</label>
                <span><textarea name="alamat" id=""></textarea></span>
            </div>
            <div class="element-form">
                <label for="">Tanggal Pengembalian</label>
                <span><input name="tanggal_pengembalian" type="date"></span>
            </div>
            <div class="element-form">
                <label for="">Kota (Fee pajak)</label>
                <span>
                    <select name="kota">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM kota");
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<option value='$row[kota_id]'>$row[kota] - " . rupiah($row['tarif']) . "</option>";
                        }
                        ?>
                    </select>
                </span>
            </div>
            <div class="element-form">
                <span><input type="submit" value="submit"></span>
            </div>
        </form>
    </div>
</div>
<div class="frame-data-detail">
    <h3 class="label-data">Detail Peminjaman</h3>
    <div class="frame-detail-order">
        <table class="table-list">
            <tr>
                <th class="kiri">Nama Barang</th>
                <th class="kanan">Qty</th>
                <th class="kanan">Total</th>
            </tr>
            <?php
            $subtotal = 0;
            foreach ($keranjang as $key => $value) {
                $barang_id = $key;

                $nama_barang = $value['nama_barang'];
                $quantity = $value['quantity'];
                $harga = $value['harga'];

                $total = $quantity * $harga;
                $subtotal = $subtotal + $total;
                echo "
                        <tr>
                            <td class='kiri'>$nama_barang</td>
                            <td class='kanan'>$quantity</td>
                            <td class='kanan'>$" . rupiah($total) . "</td>
                        </tr>
                    ";
            }
            echo "
                    <tr class=''>
                        <td colspan = '2' class='kanan'><b>Sub total : </b></td>
                        <td class='kanan'><b>" . rupiah($subtotal) . "</b></td>
                    </tr>
                ";
            ?>
        </table>
    </div>
</div>