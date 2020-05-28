<?php 
include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

session_start();

$pesanan_id = $_GET["pesanan_id"];
$button = $_POST["button"];

if ($button == 'konfirmasi') {
    $user_id = $_SESSION["user_id"];
    $nomor_rekening = $_POST["nomor_rekening"];
    $nama_account = $_POST["nama_account"];
    $tanggal_transfer = $_POST["tanggal_transfer"];

    $query = mysqli_query($conn,"INSERT INTO konfirmasi_pembayaran (pesanan_id, nomor_rekening, nama_account, tanggal_transfer) VALUES ('$pesanan_id','$nomor_rekening','$nama_account','$tanggal_transfer') ");
    if($query){
        mysqli_query($conn, "UPDATE pesanan SET status = '1' WHERE pesanan_id='$pesanan_id'" );
    }
}else if($button == 'edit'){
    $user_id = $_SESSION["user_id"];
    $pesanan_id = $_POST["pesanan_id"];
    $status = $_POST["status"];

    mysqli_query($conn, "UPDATE pesanan SET status='$status' WHERE pesanan_id='$pesanan_id'");
    if($status == "2"){
        $query = mysqli_query($conn, "SELECT* FROM pesanan_detail WHERE pesanan_id='$pesanan_id'");
        while($row=mysqli_fetch_assoc($query)){
            $barang_id = $row["barang_id"];
            $quantity = $row["quantity"];
            mysqli_query($conn, "UPDATE barang SET stok=stok - '$quantity' WHERE barang_id=$barang_id");
        }
    }
}
header("Location: " . BASE_URL . "index.php?page=my_profile&module=pesanan&action=list");
?>