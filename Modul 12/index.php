<?php
    session_start();

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

    if($level == 'admin'){
        header('Location : admin/index.php');
    }else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
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
                if($user_id){
                    echo("
                        <ul>
                            <li><a href='index.php.>HOME</a></li>
                            <li><a href='galeri.php'>GALERI</a></li>
                            <li><a href='tentang.php'>TENTANG</a></li>
                            <li><a href='kontak.php'>KONTAK</a></li>
                            <li id=userstyle><span>$nama</span></li>
                            <li><a href='logout.php'>logout</a></li>
                        </ul>
                    ");
                }else {
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
        <div id="isi">
            <h1>SELAMAT DATANG</h1>
            <p style="text-align: justify;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis officia magnam a, vero ipsa unde velit quo at eveniet cum illo saepe assumenda voluptate earum laborum voluptatem facere! Et, quo?.</p>
            <h1>GALERI</h1>
            <p style="text-align: right; margin-top: -30px;"><a href="galeri.php" style="text-decoration: none; color: #4d80b3">Lihat lainnya...</a></p>
            <div class="galeri">
                <img src="gambar/book1.jpg" alt="">
                <p><a href="galeri.php"><button class="button">Lihat Buku</button></a></p>
            </div>
            <div class="galeri">
                <img src="gambar/book2.jpg" alt="">
                <p><a href="galeri.php"><button class="button">Lihat Buku</button></a></p>
            </div>
            <div class="galeri">
                <img src="gambar/book3.jpg" alt="">
                <p><a href="galeri.php"><button class="button">Lihat Buku</button></a></p>
            </div>
        </div>
        <div id="clear"></div>
        <div id="footer">
            <p>Dibuat dengan ❤ oleh Bayu Wira</p>
        </div>
    </div>
</body>

</html>
<?php
    }
?>