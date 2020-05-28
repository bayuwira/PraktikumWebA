<?php
session_start();
include_once("function/helper.php");
include_once("function/koneksi.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;


$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
$totalBarang = count($keranjang);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>byshop</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . "css/style.css" ?>">
    <script src='<?php echo BASE_URL . "js/jquery.min.js" ?>'></script>
    <script src='<?php echo BASE_URL . "js/slides/source/jquery.slides.min.js" ?>'></script>
    <script>
        $(function() {
            $('#slides').slidesjs({
                height: 350,
                play: {
                    auto: true,
                    interval: 3000,
                },
                navigation: false
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="<?php echo BASE_URL . "index.php" ?>">
                <img src="<?php echo BASE_URL . "images/logo.png" ?>" alt="">
            </a>
            <div class="menu">
                <div class="user">
                    <?php
                    if ($user_id) {
                        echo ("<a href='" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=list'>Halo $nama </a>");
                        echo "<a href='" . BASE_URL . "index.php?page=profile_user'>MyProfile</a>";
                        echo "<a href='" . BASE_URL . "logout.php'>Logout</a>";
                    } else {
                        echo "<a href='" . BASE_URL . "index.php?page=login'>Login</a>";
                        echo "<a href='" . BASE_URL . "index.php?page=register'>Register</a>";
                    }
                    ?>

                </div>
                <a class="button-cart" href="<?php echo BASE_URL . "index.php?page=keranjang" ?>">
                    <img src="<?php echo BASE_URL . "images/cart.png" ?>" alt="">
                    <?php
                    if ($totalBarang != 0) {
                        echo "<span class='total-barang'>$totalBarang</span>";
                    }
                    ?>
                </a>
            </div>
        </div>
        <div class="content">
            <?php
            $filename = "$page.php";

            if (file_exists($filename)) {
                include_once($filename);
            } else {
                include_once("main.php");
            }
            ?>
        </div>
        <div class="footer">
            <p>© bayuwirab - project perpustakaan 2020</p>
        </div>
    </div>
</body>


</html>