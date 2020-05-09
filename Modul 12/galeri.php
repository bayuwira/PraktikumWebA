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
    <title>Galeri</title>
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
        <div id="galery-content">
            <h1>Data Buku</h1>
            <h3>Cari Pustaka<input type="text" placeholder="Search.." id="mySearch"> <button class="button">Cari</button></h3>
            <table style="width: 700px; border: none;">
                <tr>
                    <td>
                        <p style="margin-top: -100px;">1</p>
                    </td>
                    <td>
                        <div class="galeri">
                            <img src="gambar/book1.jpg" alt="">
                        </div>
                    </td>
                    <td>
                        <div id="detail">
                            <p>Nama Buku : Book 1</p>
                            <p>Tahun Terbit : Year</p>
                            <p>Nama Penerbit : Author</p>
                            <p>Kode : 1</p>
                            <p><a href="#"><button class="button">Beli</button></a></p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="margin-top: -100px;">2</p>
                    </td>
                    <td>
                        <div class="galeri">
                            <img src="gambar/book2.jpg" alt="">
                        </div>
                    </td>
                    <td>
                        <div id="detail">
                            <p>Nama Buku : Book 2</p>
                            <p>Tahun Terbit : Year</p>
                            <p>Nama Penerbit : Author</p>
                            <p>Kode : 1</p>
                            <p><a href="#"><button class="button">Beli</button></a></p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="margin-top: -100px;">3</p>
                    </td>
                    <td>
                        <div class="galeri">
                            <img src="gambar/book3.jpg" alt="">
                        </div>
                    </td>
                    <td>
                        <div id="detail">
                            <p>Nama Buku : Book 3</p>
                            <p>Tahun Terbit : Year</p>
                            <p>Nama Penerbit : Author</p>
                            <p>Kode : 1</p>
                            <p><a href="#"><button class="button">Beli</button></a></p>
                        </div>
                    </td>
                </tr>
            </table>
            <br>
            <center>
                <div class="pagination">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">&raquo;</a>
                </div>
            </center>
        </div>
        <div id="clear"></div>
        <div id="footer">
            <p>Dibuat dengan ❤ oleh Bayu Wira</p>
        </div>
    </div>
</body>

</html>