<div class="frame-tambah">
    <a href="<?php echo BASE_URL . "index.php?page=my_profile&module=kategori&action=form";?>" class="tombol-action">+ Tambah Kategori</a>
</div>

<?php
    $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
    $data_per_halaman = 3;
    $page_pertama = ($pagination - 1) * $data_per_halaman;

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori LIMIT $page_pertama, $data_per_halaman");

    if(mysqli_num_rows($queryKategori) == 0){
        echo "<h3>Belum ada kategori</h3>";
    }
    else{
        echo "<table class = 'table-list'>";
        echo "<tr class = 'baris-title'>
                <th class='kolom-nomor'>No</th>
                <th class='kiri'>Kategori</th>
                <th class='tengah'>Status</th>
                <th class='kanan'>Action</th>
            </tr>";
        $no = 1 + $page_pertama;
        while($row=mysqli_fetch_assoc($queryKategori)){
        echo "<tr>
                <td class='kolom-nomor'>$no</td>
                <td class='kiri'>$row[kategori]</td>
                <td class='tengah'>$row[status]</td>
                <td class='tengah'>
                    <a class='tombol-action' href='" . BASE_URL . "module/kategori/action.php?button=delete&kategori_id=$row[kategori_id]'>Hapus</a>
                    <a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'>Edit</a>
                </td>
            </tr>";
            $no++;
        }
        echo "</table>";

        $query = mysqli_query($conn, "SELECT * FROM kategori");
        $url = "index.php?page=my_profile&module=kategori&action=list" ;
        pagination($query, $data_per_halaman, $pagination, $url);
    }
?>