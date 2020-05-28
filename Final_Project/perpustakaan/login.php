<?php
    if ($user_id) {
        header("Location:" . BASE_URL);
    }
?>

<div class="container-user-register">
    <form action="<?php echo BASE_URL . "user_login.php"; ?>" method="POST">
        <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        if ($notif == "success") {
            echo "<div class='notif-valid'> Data berhasil disimpan, silahkan login </div>";
        }

        if ($notif == "require") {
            echo "<div class='notif'> ! username atau password salah </div>";
        }
        ?>

        <div class="element-form">
            <label for="">Email</label>
            <span><input type="text" name="email" ></span>
        </div>
        <div class="element-form">
            <label for="">Password</label>
            <span><input type="password" name="password"></span>
        </div>
        <div class="element-form">
            <span><input type="submit"></span>
        </div>
    </form>
</div>