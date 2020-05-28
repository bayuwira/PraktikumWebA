<?php
if ($totalBarang == 0) {
    echo "<h3>Keranjang kosong</h3>";
} else {
    $no = 1;
    echo "
            <table class='table-list'>
                <tr class='baris-title'>
                    <th class='tengah'>No</th>
                    <th class='kiri'>Image</th>
                    <th class='kiri'>Barang</th>
                    <th class='tengah'>Qty</th>
                    <th class='kanan'>Harga Pinjam</th>
                    <th class='kanan'>Total</th>
                </tr>";
    $subtotal = 0;
    foreach ($keranjang as $key => $value) {
        $barang_id = $key;
        $nama_barang = $value["nama_barang"];
        $quantity = $value["quantity"];
        $gambar = $value["gambar"];
        $harga = $value["harga"];


        $total = $quantity * $harga;
        $subtotal = $subtotal + $total;

        echo "
                <tr class=''>
                    <td class='tengah'>$no</td>
                    <td class='kiri'><img src='" . BASE_URL . "images/barang/$gambar' height='100px'></td>
                    <td class='kiri'>$nama_barang</td>
                    <td class='tengah'><input type='text' name='$barang_id', value='$quantity' class='update-quantity'></td>
                    <td class='kanan'>" . rupiah($harga) . "</td>
                    <td class='kanan hapus_item'>" . rupiah($total) . " <a href = '".BASE_URL."hapus_item.php?barang_id=$barang_id'> X </a></td>
                </tr>
            ";
        $no++;
    }
    echo "
        <tr class=''>
            <td colspan = '5' class='kanan'><b>Sub total : </b></td>
            <td class='kanan'><b>".rupiah($subtotal)."</b></td>
        </tr>
    ";
    echo "</table>";

    echo "
        <div class='frame-button-keranjang'>
            <a class='lanjut-belanja' href='".BASE_URL. "index.php'> < Lihat Buku</a>
            <a class='lanjut-pemesanan' href='" . BASE_URL . "index.php?page=data_pemesanan'>Lanjut Pinjam > </a>
        </div>
    ";
}
?>

<script>
    $(".update-quantity").on("input", function(e) {
        var barang_id = $(this).attr("name");
        var value = $(this).val();

        $.ajax({
                method: "POST",
                url: "update_keranjang.php",
                data: "barang_id=" + barang_id + "&value=" + value
            })

        .done(function(data) {
            var json = $.parseJSON(data);
            if (json.status == true) {  
                location.reload();
            } else {
                alert(json.pesan);
                location.reload();
            }
        });

    })
</script>