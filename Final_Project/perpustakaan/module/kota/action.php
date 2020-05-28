<?php
    include("../../function/koneksi.php");   
    include("../../function/helper.php");

    adminOnly($level, "kota");
    $kota = isset($_POST["kota"]) ? $_POST["kota"] : "";
    $status = isset($_POST["status"]) ? $_POST["status"] : "";
    $tarif = isset($_POST["tarif"]) ? $_POST["tarif"] : "";
    $button = isset($_POST["button"]) ? $_POST["button"] : $_GET["button"];
	
	if($button == "Add"){
		mysqli_query($conn, "INSERT INTO kota (kota, tarif, status) VALUES('$kota', '$tarif', '$status')");
	}
	else if($button == "Update"){
		$kota_id = $_GET['kota_id'];
		
		mysqli_query($conn, "UPDATE kota SET kota='$kota',
												tarif='$tarif',
												status='$status' WHERE kota_id='$kota_id'");
	}
	else if($button == 'delete'){
        $kota_id = $_GET["kota_id"];
        mysqli_query($conn, "DELETE FROM kota WHERE kota_id='$kota_id'");
    }
	header("location:" .BASE_URL."index.php?page=my_profile&module=kota&action=list");