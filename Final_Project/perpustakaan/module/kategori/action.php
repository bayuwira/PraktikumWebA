<?php
include_once("../../function/helper.php");
include_once("../../function/koneksi.php");

adminOnly($level, "kategori");

$kategori = isset($_POST["kategori"]) ? $_POST["kategori"] : "";
$status = isset($_POST["status"]) ? $_POST["status"] : "";
$button = isset($_POST["button"]) ? $_POST["button"] : $_GET["button"];

if($button == 'Add'){
    mysqli_query($conn, "INSERT INTO `kategori` (`kategori`, `status`) VALUES ('$kategori', '$status')");
}
else if($button == 'Update'){
    $kategori_id = $_GET["kategori_id"];
    mysqli_query($conn, "UPDATE `kategori` SET `kategori` = '$kategori', `status` = '$status' WHERE kategori_id='$kategori_id'");
}
else if($button == 'delete'){
    $kategori_id = $_GET["kategori_id"];
    mysqli_query($conn, "DELETE FROM kategori WHERE kategori_id='$kategori_id'");
}
header("Location: " . BASE_URL . "index.php?page=my_profile&module=kategori&action=list");

?>