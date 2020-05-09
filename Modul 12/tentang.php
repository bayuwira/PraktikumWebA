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
    <title>Tentang</title>
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
        <div id="tentang-content">
            <h1>Tentang Kami</h1>
            <h3>Sejarah</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <h3>Visi & Misi</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div id="clear"></div>
        <div id="footer">
            <p>Dibuat dengan ❤ oleh Bayu Wira</p>
        </div>
    </div>
</body>

</html>