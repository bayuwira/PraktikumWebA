<?php
    include_once("function/helper.php");
    include_once("function/koneksi.php");

    $email = $_POST["email"];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE `email` = '$email' AND `password` = '$password' AND `status` = 'on'";

    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) == 0){
        header("location: " . BASE_URL . "index.php?page=login&notif=require");
    }else{
        $row = mysqli_fetch_assoc($query);

        session_start();

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['level'] = $row['level'];

        if ($_SESSION['proses_pesanan']) {
            unset($_SESSION['proses_pesanan']);
            header("location: " . BASE_URL . "index.php?page=data_pemesanan");
        }else if ($_SESSION['level'] == 'superadmin' ){
            header("location: " . BASE_URL . "index.php?page=my_profile&module=pesanan&action=list");
        }else{
            header("location: " . BASE_URL . "index.php");
        }
        
    }
?>