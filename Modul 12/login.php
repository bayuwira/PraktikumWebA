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
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="galeri.php">GALERI</a></li>
                <li><a href="tentang.php">TENTANG</a></li>
                <li><a href="kontak.php">KONTAK</a></li>
                <li id="login"><a href="login.php">LOGIN</a></li>
            </ul>
        </div>
        <div class="kontak-container">
            <?php
                $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
                if ($notif == "gagal") {
                    echo "<div class='notif'> ! username atau password salah </div>";
                }
            ?>
            <h3>Login</h3>
            <form action="user_login.php" method="POST">
                <label for="email">email</label>
                <input type="text" id="email" name="email" placeholder="">

                <label for="password">password</label>
                <input type="password" id="password" name="password" placeholder="">
                <input type="submit" value="login">
            </form>
        </div>
        <div id="clear"></div>
        <div id="footer">
            <p>Dibuat dengan ❤ oleh Bayu Wira</p>
        </div>
    </div>
</body>

</html>