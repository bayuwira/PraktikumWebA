<?php

    $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
    $data_per_halaman = 3;
    $page_pertama = ($pagination - 1) * $data_per_halaman;

    if($level == 'superadmin'|| $level == 'ultraadmin'){
        $sql = "SELECT pesanan.*, user.nama FROM pesanan JOIN user on pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC";
        $query = mysqli_query($conn, "$sql LIMIT $page_pertama, $data_per_halaman");
    }else{
        $sql = "SELECT pesanan.*, user.nama FROM pesanan JOIN user on pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC";
        $query = mysqli_query($conn, "$sql LIMIT $page_pertama, $data_per_halaman");
    }


    if(mysqli_num_rows($query) == 0){
        echo "<h3>Saat ini belum ada data pemesanan</h3>";
    }else{
        echo "
            <table class='table-list'>
                <tr class='baris-title'>
                    <th class='kiri'>Nomor</th>
                    <th class='kiri'>Tanggal Pemesanan</th>
                    <th class='kiri'>Status</th>
                    <th class='kiri'>Nama Penerima</th>
                    <th class='kiri'>Tanggal Kembali</th>
                    <th class='tengah'>Action</th>
                </tr>
        ";
        $adminButton = "";
        while ($row=mysqli_fetch_assoc($query)) {
            if($level == 'superadmin' || $level == 'ultraadmin'){
                $adminButton = "<a class='tombol-action' href='". BASE_URL . "index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update Status</a>";
            }
            $status = $row['status'];
            echo "
                <tr class=''>
                    <td class='kiri'>$row[pesanan_id]</td>
                    <td class='kiri'>$row[tanggal_pemesanan]</td>
                    <td class='kiri'>$arrayStatusPesanan[$status]</td>
                    <td class='kiri'>$row[nama]</td>
                    <td class='kiri'>$row[tanggal_pengembalian]</td>
                    <td class='kiri'>
                        <a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail Pesanan</a>
                        $adminButton
                    </td>
                </tr>
            ";
        }
        echo "</table>";

    $query2 = mysqli_query($conn, $sql);
    $url = "index.php?page=my_profile&module=pesanan&action=list";
    pagination($query2, $data_per_halaman, $pagination, $url);
    }
?>