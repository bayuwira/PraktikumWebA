<?php
include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

adminOnly($level, "barang");
$barang_id = isset($_POST["barang_id"]) ? $_POST["barang_id"] : "";
$status = isset($_POST["status"]) ? $_POST["status"] : "";
$button = isset($_POST["button"]) ? $_POST["button"] : $_GET["button"];

$kategori_id = $_POST["kategori_id"];
$nama_barang = isset($_POST["nama_barang"]) ? $_POST["nama_barang"] : "";
$spesifikasi = isset($_POST["spesifikasi"]) ? $_POST["spesifikasi"] : "";
$stok = isset($_POST["stok"]) ? $_POST["stok"] : "";
$harga = isset($_POST["harga"]) ? $_POST["harga"] : "";
$update_gambar = "";

#untuk file
if(!empty($_FILES["file"]["name"])){
    $nama_file = $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/barang/" . $nama_file);

    $update_gambar = ", gambar='$nama_file'";
}

if($button == 'Add'){
    mysqli_query($conn, "INSERT INTO `barang` (`nama_barang`, `kategori_id`, `spesifikasi`, `gambar`, `harga`, `stok`, `status`) 
    VALUES ('$nama_barang', '$kategori_id', '$spesifikasi', '$nama_file', '$harga', '$stok', '$status')");
}
else if($button == 'Update'){
    $barang_id = $_GET["barang_id"];
    mysqli_query($conn, "UPDATE `barang` SET `kategori_id` = '$kategori_id', 
                                                `status` = '$status',
                                                `nama_barang` = '$nama_barang', 
                                                `spesifikasi` = '$spesifikasi',
                                                `harga` = '$harga',
                                                `stok` = '$stok'
                                                $update_gambar
                                                WHERE barang_id='$barang_id'");
}
else if($button == 'delete'){
    $barang_id = $_GET["barang_id"];
    mysqli_query($conn, "DELETE FROM barang WHERE barang_id='$barang_id'");
}
header("Location: " . BASE_URL . "index.php?page=my_profile&module=barang&action=list");

?>