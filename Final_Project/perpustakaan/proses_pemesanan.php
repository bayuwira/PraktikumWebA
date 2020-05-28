<?php 
    include_once("function/koneksi.php");
    include_once("function/helper.php");

    session_start();

    $nama_penerima = $_POST['nama_penerima'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    $user_id = $_SESSION['user_id'];
    $waktu_saat_ini = date("Y-m-d H:i:s");

    $query = "INSERT INTO `pesanan` (`user_id`,`nama_penerima`,`nomor_telepon`, `kota_id`, `alamat`, `tanggal_pemesanan`, `tanggal_pengembalian`, `status`) 
                                        VALUES ('$user_id','$nama_penerima', '$nomor_telepon','$kota','$alamat','$waktu_saat_ini','$tanggal_pengembalian','0')";

    if(mysqli_query($conn, $query)){
        $last_pesanan_id = mysqli_insert_id($conn);

        $keranjang = $_SESSION['keranjang'];
        foreach ($keranjang as $key => $value) {
            $barang_id = $key;
            $quantity = $value['quantity'];
            $harga = $value['harga'];
            $query = "INSERT INTO pesanan_detail (pesanan_id, barang_id, quantity, harga)
                                                            VALUES ('$last_pesanan_id', 
                                                            '$barang_id', 
                                                            '$quantity', '$harga')";
            if(mysqli_query($conn, $query)){
                unset($_SESSION["keranjang"]);
                header("location: " . BASE_URL . "index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$last_pesanan_id");
            }
            else{
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
                unset($_SESSION["keranjang"]);
            }
        }
        
    }else{
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        unset($_SESSION["keranjang"]);
    }

?>