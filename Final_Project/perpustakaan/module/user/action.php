<?php
    include("../../function/koneksi.php");   
    include("../../function/helper.php");

    adminOnly($level, "user");
    $user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : $_GET['user_id'];
    $status = isset($_POST["status"]) ? $_POST["status"] : "";
    $nama = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $alamat = isset($_POST["alamat"]) ? $_POST["alamat"] : "";
    $level = isset($_POST["level"]) ? $_POST["level"] : "";
    $button = isset($_POST["button"]) ? $_POST["button"] : $_GET["button"];

    if ($button == 'Add') {
        mysqli_query($conn, "INSERT INTO `user` (`nama`, `email`, `phone`, `alamat`, `level`, `status`) 
        VALUES ('$nama', '$email', '$phone', '$alamat', '$level', '$status')");
    }
    else if ($button == 'Update') {
	mysqli_query($conn, "UPDATE user SET nama='$nama',
											email='$email',
											phone='$phone',
											alamat='$alamat',
											level='$level',
											status='$status'
											WHERE user_id='$user_id'");
    }
    else if($button == 'delete'){
        $user_id = $_GET["user_id"];
        mysqli_query($conn, "DELETE FROM user WHERE user_id='$user_id'");
    }
    header("location: " . BASE_URL . "index.php?page=my_profile&module=user&action=list");
?>