<?php
if (!$user_id) {
    header("Location:" . BASE_URL);
} else {
    $button = "Update";
    $queryUser = mysqli_query($conn, "SELECT * FROM user WHERE user_id='$user_id'");

    $row = mysqli_fetch_array($queryUser);

    $nama = $row["nama"];
    $email = $row["email"];
    $phone = $row["phone"];
    $alamat = $row["alamat"];
    $status = $row["status"];
    $level = $row["level"];
    $password = $row["password"];

?>

    <div class="container-user-register">
        <form action="<?php echo BASE_URL . "user_update.php"; ?>" method="POST">
            <?php
            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;



            if ($notif == "require") {
                echo "<div class='notif'> ! Lengkapi Form terlebih dahulu </div>";
            }
            ?>
            <div class="element-form">
                <span><input type="hidden" name="user_id" value="<?php echo $user_id ?>"></span>
            </div>
            <div class="element-form">
                <label for="">Nama Lengkap</label>
                <span><input type="text" name="nama" value="<?php echo $nama ?>"></span>
            </div>
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
            <div class="element-form">
                <span><input type="submit" value="<?php echo $button ?>"></span>
            </div>
        </form>
    </div>
<?php } ?>