<?php 
    include_once("function/koneksi.php");
    include_once("function/helper.php");

    $user_id = isset($_POST["user_id"]) ? $_POST["user_id"] : $_GET['user_id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];

    if ( empty($nama) || empty($alamat) || empty($email) || empty($phone) ){
        header("location: " . BASE_URL . "index.php?page=register&notif=require&$dataForm");
    }else {
        $sql = "UPDATE user SET nama='$nama',
											email='$email',
											phone='$phone',
											alamat='$alamat'
											WHERE user_id='$user_id'";
        if (mysqli_query($conn, $sql)) {
            header("location: " . BASE_URL . "index.php");
        } else {
            echo "failed to insert" . $sql . "<br>" . mysqli_error($conn);
        }
        
    }
