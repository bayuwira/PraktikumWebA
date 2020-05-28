<div class="frame-tambah">
    <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=user&action=form"; ?>" class="tombol-action">+ Tambah User</a>
</div>
<?php
$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
$data_per_halaman = 3;
$page_pertama = ($pagination - 1) * $data_per_halaman;
$pgn = "LIMIT $page_pertama, $data_per_halaman";


$queryAdmin = mysqli_query($conn, "SELECT * FROM user ORDER BY nama ASC $pgn");
$no = 1 + $page_pertama;

if (mysqli_num_rows($queryAdmin) == 0) {
    echo "<h3>Saat ini belum ada data user yang dimasukan</h3>";
} else {
    echo "<table class='table-list'>";

    echo "<tr class='baris-title'>
                    <th class='kolom-nomor'>No</th>
                    <th class='kiri'>Nama</th>
                    <th class='kiri'>Email</th>
                    <th class='kiri'>Phone</th>
                    <th class='kiri'>Level</th>
                    <th class='tengah'>Status</th>
                    <th class='tengah'h>Action</th>
                </tr>";

    while ($rowUser = mysqli_fetch_array($queryAdmin)) {
        echo "<tr>
                        <td class='kolom-nomor'>$no</td>
                        <td>$rowUser[nama]</td>
                        <td>$rowUser[email]</td>
                        <td>$rowUser[phone]</td>
                        <td>$rowUser[level]</td>
                        <td class='tengah'>$rowUser[status]</td>
                        <td class='tengah'>
                            <a class='tombol-action' href='" . BASE_URL . "module/user/action.php?button=delete&user_id=$rowUser[user_id]'>Hapus</a>
                            <a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]" . "'>Edit</a>
                        </td>
                    </tr>";

        $no++;
    }

    //AKHIR DARI TABLE
    echo "</table>";

    $url = "index.php?page=my_profile&module=user&action=list";
    $queryAdmin = mysqli_query($conn, "SELECT * FROM user ORDER BY nama ASC");
    pagination($queryAdmin, $data_per_halaman, $pagination, $url);
}
?>