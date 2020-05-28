<?php
$search = isset($_GET['search']) ? $_GET['search'] : false;
$where = "";
$search_url = "";

if ($search) {
    $search_url = "&search=$search";
    $where = "WHERE barang.nama_barang LIKE '%$search%'";
}
?>

<div class="frame-tambah">
    <div class="left">
        <form action="<?php echo BASE_URL . "index.php"; ?>" method="GET">
            <input type="hidden" name="page" value="<?php echo ($_GET["page"]) ?>">
            <input type="hidden" name="module" value="<?php echo $_GET["module"] ?>">
            <input type="hidden" name="action" value="<?php echo $_GET["action"] ?>">
            <input type="text" name="search" value="<?php echo $search ?>">
            <input type="submit" value="search" name="" id="">
        </form>
    </div>
    <div class="right">
        <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=barang&action=form"; ?>" class="tombol-action">+ Tambah Barang</a>
    </div>
</div>

<?php


$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
$data_per_halaman = 5;
$page_pertama = ($pagination - 1) * $data_per_halaman;

$queryBarang = mysqli_query($conn, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id $where LIMIT $page_pertama, $data_per_halaman");

if (mysqli_num_rows($queryBarang) == 0) {
    echo "<h3>Belum ada Barang</h3>";
} else {
    echo "<table class = 'table-list'>";
    echo "<tr class = 'baris-title'>
                <th class='kolom-nomor'>No</th>
                <th class='kiri'>Barang</th>
                <th class='kiri'>Kategori</th>
                <th class='kiri'>Harga</th>
                <th class='kiri'>Status</th>
                <th class='tengah'>Stok</th>
                <th class='tengah'>Action</th>
            </tr>";
    $no = 1 + $page_pertama;
    while ($row = mysqli_fetch_assoc($queryBarang)) {
        echo "<tr>
                <td class='kolom-nomor'>$no</td>
                <td class='kiri'>$row[nama_barang]</td>
                <td class='kiri'>$row[kategori]</td>
                <td class='kiri'>" . rupiah($row["harga"]) . "</td>
                <td class='kiri'>$row[status]</td>
                <td class='tengah'>$row[stok]</td>
                <td class='tengah'>
                    <a class='tombol-action' href='" . BASE_URL . "module/barang/action.php?button=delete&barang_id=$row[barang_id]'>Hapus</a>
                    <a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]'>Edit</a>
                </td>
            </tr>";
        $no++;
    }
    echo "</table>";
    $query = mysqli_query($conn, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id $where");
    $url = "index.php?page=my_profile&module=barang&action=list$search_url";
    pagination($query, $data_per_halaman, $pagination, $url);
}
?>