<?php
$pesanan_id = $_GET["pesanan_id"];
$sql = "SELECT pesanan.pesanan_id, 
                    pesanan.nama_penerima, 
                    pesanan.nomor_telepon, 
                    pesanan.alamat, 
                    pesanan.tanggal_pemesanan,
                    pesanan.tanggal_pengembalian, 
                    user.nama, 
                    kota.kota, 
                    kota.tarif FROM pesanan JOIN user ON pesanan.user_id=user.user_id JOIN kota ON kota.kota_id=pesanan.kota_id WHERE pesanan.pesanan_id='$pesanan_id'";
$query =  mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$tanggal_pesanan = $row['tanggal_pemesanan'];
$tanggal_kembali = $row['tanggal_pengembalian'];
$nama_penerima = $row['nama_penerima'];
$nomor_telepon = $row['nomor_telepon'];
$alamat = $row['alamat'];
$tarif = $row['tarif'];
$nama = $row['nama'];
$kota = $row['kota'];
?>

<div class="frame-faktur">
    <h3>
        <center>Detail Pesanan</center>
    </h3>
    <hr>
    <table class="table-faktur">
        <tr>
            <td>Nomor Faktur</td>
            <td>:</td>
            <td><?php echo $pesanan_id; ?></td>
        </tr>
        <tr>
            <td>Nama Pemesan</td>
            <td>:</td>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td>Nama Penerima</td>
            <td>:</td>
            <td><?php echo $nama_penerima; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>:</td>
            <td><?php echo $nomor_telepon; ?></td>
        </tr>
        <tr>
            <td>Tanggal Pemesanan</td>
            <td>:</td>
            <td><?php echo $tanggal_pesanan; ?></td>
        </tr>
        <tr>
            <td>Tanggal Pengembalian</td>
            <td>:</td>
            <td><?php echo $tanggal_kembali; ?></td>
        </tr>
    </table>
</div>
<table class="table-list">
    <tr class="baris-title">
        <th class="tengah">No</th>
        <th class="kiri">Nama Barang</th>
        <th class="tengah">Qty</th>
        <th class="kanan">Harga Satuan</th>
        <th class="kanan">Total</th>
    </tr>
    <?php
    $query = mysqli_query($conn, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");
    $no = 1;
    $subtotal = 0;
    while ($rowD = mysqli_fetch_assoc($query)) {
        $total = $rowD['harga'] * $rowD['quantity'];
        $subtotal = $subtotal + $total;
        echo "
            <tr>
                <td class='tengah'>$no</td>
                <td class='kiri'>$rowD[nama_barang]</td>
                <td class='tengah'>$rowD[quantity]</td>
                <td class='kanan'>" . rupiah($rowD['harga']) . "</td>
                <td class='kanan'>" . rupiah($total) . "</td>
            </tr>
        ";
        $no++;
    }
    $subtotal = $subtotal + $tarif;
    ?>
    <tr>
        <td class='kanan ' colspan="4"></td>
        <td class='kanan'></td>
    </tr>
    <tr>
        <td class='kanan ' colspan="4">Biaya Pengiriman</td>
        <td class='kanan'><?php echo rupiah($tarif); ?></td>
    </tr>
    <tr>
        <td class='kanan ' colspan="4"><b>Sub Total</b></td>
        <td class='kanan'><b><?php echo rupiah($subtotal); ?></b></td>
    </tr>
</table>
<?php 
    if($level == 'customer'){

?>
<div class="frame-keterangan-pemabayaran">
    <p>
        Silahkan melakukan pembayaran ke Bank ABC <br>
        Nomor Account : 999-473-8463 (A/N Perpustakaan) <br>
        Setelah melakukan pembayaran silahkan konfirmasi agar buku bisa dipinjam
        <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id" ?>">disini</a>
    </p>
</div>

 <?php } ?>