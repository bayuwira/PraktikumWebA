<?php
    define("BASE_URL", "http://localhost/PraktikumWebA/Final/perpustakaan/");

    $arrayStatusPesanan[0] = "Menunggu Pembayaran";
    $arrayStatusPesanan[1] = "Belum divalidasi";
    $arrayStatusPesanan[2] = "Buku Dipinjam";
    $arrayStatusPesanan[3] = "Ditolak";


    function rupiah($nilai = 0){
        $string = "Rp " . number_format($nilai);
        return $string;
    }

    function kategori($kategori_id = false){
        global $conn;
        $string = "<div class='menu-kategori'>";
            $string .= "<ul>";
                    $query = mysqli_query($conn, "SELECT * FROM kategori WHERE status = 'on'");
                    while($row = mysqli_fetch_assoc($query)){
                        if($kategori_id == $row["kategori_id"]){
                            $string .= "
                                <li><a class='active' href='" . BASE_URL . "index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>
                            ";
                        }else{
                            $string .= "
                                <li><a href='" . BASE_URL . "index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>
                            ";
                        }
                    }
            $string .= "</ul>";        
        $string .= "</div>";

        return $string;
    }

    function adminOnly($level, $module){
        if ($level != "ultraadmin") {
            $admin_pages = array("kategori", "barang", "banner", "user", "kota", "user");
            if (in_array($module, $admin_pages)) {
                header("Location: " . BASE_URL);
            }
        }
        else if ($level != "superadmin") {
            $admin_pages = array("kategori", "barang", "banner", "kota", "user");
            if (in_array($module, $admin_pages)) {
                header("Location: " . BASE_URL);
            }
        }
    }

    function pagination($query, $data_per_halaman, $pagination, $url){

        $total_data = mysqli_num_rows($query);
        $total_halaman = ceil($total_data / $data_per_halaman);
        echo "<ul class='pagination'>";
        if ($pagination > 1) {
            $prev = $pagination - 1;
            echo "<li><a href='" . BASE_URL . "$url&pagination=$prev'><< Prev</a></li>";
        }

        for ($i = 1; $i <= $total_halaman; $i++) {
            if ($pagination == $i) {
                echo "<li><a class='active' href='" . BASE_URL . "$url&pagination=$i'>$i</a></li>";
            } else {
                echo "<li><a href='" . BASE_URL . "$url&pagination=$i'>$i</a></li>";
            }
        }

        if ($pagination < $total_halaman) {
            $next = $pagination + 1;
            echo "<li><a href='" . BASE_URL . "$url&pagination=$next'>Next >></a></li>";
        }
        echo "</ul>";
    }
?>