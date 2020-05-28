<?php
    if ($user_id) {
        header("Location:" . BASE_URL);
    }
    else{
        
?>

<div class="container-user-register">
    <form action="<?php echo BASE_URL . "user_register.php"; ?>" method="POST">
        <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
        $alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;
        $phone = isset($_GET['phone']) ? $_GET['phone'] : false;
        $email = isset($_GET['email']) ? $_GET['email'] : false;



        if ($notif == "require") {
            echo "<div class='notif'> ! Lengkapi Form terlebih dahulu </div>";
        }
        ?>
        <div class="element-form">
            <label for="">Nama Lengkap</label>
            <span><input type="text" name="nama_lengkap" value="<?php echo $nama_lengkap ?>"></span>
        </div>
        <?php
        if ($notif == "email") {
            echo "<div class='notif'> ! Email sudah terdaftar </div>";
        }
        ?>
        <div class="element-form">
            <label for="">Email</label>
            <span><input type="text" name="email" value="<?php echo $email ?>"></span>
        </div>
        <div class="element-form">
            <label for="">No. Hp</label>
            <span><input type="text" name="phone" value="<?php echo $phone ?>"></span>
        </div>
        <div class="element-form">
            <label for="">Alamat</label>
            <span><textarea name="alamat" id="" rows="5"><?php echo $alamat ?></textarea></span>
        </div>

        <?php
        if ($notif == "password") {
            echo "<div class='notif'> ! Password tidak match </div>";
        }
        ?>
        <div class="element-form">
            <label for="">Password</label>
            <span><input type="password" name="password"></span>
        </div>
        <div class="element-form">
            <label for="">Confirm Password</label>
            <span><input type="password" name="re_password"></span>
        </div>
        <div class="element-form">
            <span><input type="submit" value="register"></span>
        </div>
    </form>
</div>
<?php } ?>