<?php
session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

if ($level == 'admin') {
    header('Location : admin/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Kontak</title>
</head>

<body>
    <div id="main-content">
        <div id="atas">
            <img src="gambar/header.jpg" alt="" style="height: 250px; width: 700px;">
            <p style="color: white; font-weight: bolder;">TOKO BUKU BEWE</p>
        </div>
        <div id="sidebar">
            <img src="gambar/logo.png" alt="" style="height: auto; width: 240px;">
            <div class="populer">
                <p>Artikel Populer</p>
            </div>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="galeri.php">GALERI</a></li>
                <li><a href="tentang.php">TENTANG</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
            </ul>

        </div>
        <div id="menu">
            <?php
            if ($user_id) {
                echo ("
                        <ul>
                            <li><a href='index.php.>HOME</a></li>
                            <li><a href='galeri.php'>GALERI</a></li>
                            <li><a href='tentang.php'>TENTANG</a></li>
                            <li><a href='kontak.php'>KONTAK</a></li>
                            <li id=userstyle><span>$nama</span></li>
                            <li><a href='logout.php'>logout</a></li>
                        </ul>
                    ");
            } else {
                echo ("
                        <ul>
                            <li><a href='index.php.>HOME</a></li>
                            <li><a href='galeri.php'>GALERI</a></li>
                            <li><a href='tentang.php'>TENTANG</a></li>
                            <li><a href='kontak.php'>KONTAK</a></li>
                            <li id='login'><a href='login.php'>LOGIN</a></li>
                        </ul>
                    ");
            }
            ?>

        </div>
        <div class="kontak-container">
            <h3>Contact Form</h3>
            <form action="">
                <label for="fname">Nama Depan</label>
                <input type="text" id="fname" name="firstname" placeholder="">

                <label for="lname">Nama Belakang</label>
                <input type="text" id="lname" name="lastname" placeholder="">

                <label for="country">Provinsi</label>
                <select id="country" name="country">
                    <option value="">Bali</option>
                    <option value="">Jawa</option>
                    <option value="">Sumatra</option>
                </select>
                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Tulis sesuatu" style="height:200px"></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div id="clear"></div>
        <div id="footer">
            <p>Dibuat dengan ❤ oleh Bayu Wira</p>
        </div>
    </div>
</body>

</html>