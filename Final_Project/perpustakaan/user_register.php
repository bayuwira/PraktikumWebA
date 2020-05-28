<?php 
    include_once("function/koneksi.php");
    include_once("function/helper.php");

    $level = "customer";
    $status = "on";

    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    unset($_POST['password']);
    unset($_POST['re_password']);
    $dataForm = http_build_query($_POST);

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    if ( empty($nama_lengkap) || empty($alamat) || empty($email) || empty($phone) || empty($password) ){
        header("location: " . BASE_URL . "index.php?page=register&notif=require&$dataForm");
    }elseif(mysqli_num_rows($sql) >= 1){
        header("location: " . BASE_URL . "index.php?page=register&notif=email&$dataForm");
    }elseif ($password != $re_password) {
        header("location: " . BASE_URL . "index.php?page=register&notif=password&$dataForm");
    }else {
        $password = md5($password);
        $sql = "INSERT INTO user (`level`, `nama`, `email`, `alamat`, `phone`, `password`, `status`) 
        VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password', '$status')";
        if (mysqli_query($conn, $sql)) {
            header("location: " . BASE_URL . "index.php?page=login&notif=success");
        } else {
            echo "failed to insert" . $sql . "<br>" . mysqli_error($conn);
        }
        
    }

    

?>