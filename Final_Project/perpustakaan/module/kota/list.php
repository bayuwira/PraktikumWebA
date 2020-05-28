<div class="frame-tambah">
	<a class="tombol-action" href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=form"; ?>">+ Tambah Kota</a>
</div>

<?php
    $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
    $data_per_halaman = 3;
    $page_pertama = ($pagination - 1) * $data_per_halaman;
    $pgn = "LIMIT $page_pertama, $data_per_halaman";

	$queryKota = mysqli_query($conn, "SELECT * FROM kota ORDER BY kota ASC $pgn");
	
	if(mysqli_num_rows($queryKota) == 0){
		echo "<h3>Saat ini belum ada nama kota yang didalam database.</h3>";
	}
	else{
		echo "<table class='table-list'>";
		
			echo "<tr class='baris-title'>
					<th class='kolom-nomor'>No</th>
					<th class='kiri'>Kota</th>
					<th class='kiri'>Tarif</th>
					<th class='tengah'>Status</th>
					<th class='tengah'>Action</th>
				</tr>";
				
			$no = 1 + $page_pertama;
			while($rowKota=mysqli_fetch_assoc($queryKota)){
				echo "<tr>
						<td class='kolom-nomor'>$no</td>
						<td>$rowKota[kota]</td>
						<td>".rupiah($rowKota['tarif'])."</td>
						<td class='tengah'>$rowKota[status]</td>
						<td class='tengah'>
                            <a class='tombol-action' href='" . BASE_URL . "module/kota/action.php?button=delete&kota_id=$rowKota[kota_id]'>Hapus</a>
                            <a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=kota&action=form&kota_id=$rowKota[kota_id]"."'>Edit</a>
						</td>
					</tr>";
				
				$no++;
			}
		
        echo "</table>";
    $url = "index.php?page=my_profile&module=kota&action=list";
    $queryKota = mysqli_query($conn, "SELECT * FROM kota ORDER BY kota ASC");
    pagination($queryKota, $data_per_halaman, $pagination, $url);
	}
?>