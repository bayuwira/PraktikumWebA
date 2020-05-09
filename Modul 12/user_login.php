<?php
    include_once("koneksi.php");

    $email = $_POST["email"];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE `email` = '$email' AND `password` = '$password'";

    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) == 0){
        header("location: login.php?notif=gagal");
    }else{
        $row = mysqli_fetch_assoc($query);

        session_start();

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['level'] = $row['level'];

        if ($_SESSION['level'] == 'admin'){
            header("location: admin/index.php");
        }else{
            header("location: index.php");
        }
        
    }
