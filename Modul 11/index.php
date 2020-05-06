<?php
    require_once('koneksi.php');
    require_once('perpustakaan.php');
    $conn = new Database();
    $perpus = new Perpustakaan($conn);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<table class="table table-bordered">
<thead>
<form action="" method="POST">
<tr style="width: 100px;">
<th>Filter</th>
<td>
    <input type="text " name="cari" class="form-control pj-input" placeholder="Cari">
    <select name="jenis" class="custom-select pj-select">
        <option value="">Select Filter</option>
        <option value="judul_buku">Judul</option>
        <option value="penulis_buku">Penulis</option>
        <option value="penerbit_buku">Penerbit</option>
        <option value="tahun_terbit">Tahun Terbit</option>
        <option value="stok">Stok</option>
    </select>
    <input type="submit" name="submit" id="" class="btn btncari btn-success" value="cari">
</td>
</tr>
<tr>
    <th>No.</th>
    <th>Judul Buku <br><input type="submit" class="btn btn-primary" value="ASC" name="judul"><input type="submit" class="btn btn-danger" value="DESC" name="judul"></th>
    <th>Penulis Buku <br><input type="submit" class="btn btn-primary" value="ASC" name="penulis"><input type="submit" class="btn btn-danger" value="DESC" name="penulis"></th>
    <th>Penerbit Buku<br><input type="submit" class="btn btn-primary" value="ASC" name="penerbit"><input type="submit" class="btn btn-danger" value="DESC" name="penerbit"></th>
    <th>Tahun Penerbit<br><input type="submit" class="btn btn-primary" value="ASC" name="tahun_terbit"><input type="submit" class="btn btn-danger" value="DESC" name="tahun_terbit"></th>
    <th>Stok<br><input type="submit" class="btn btn-primary" value="ASC" name="stok"><input type="submit" class="btn btn-danger" value="DESC" name="stok"></th>
</tr>
</form>
</thead>
<tbody>
<?php
$no = 1;
$sort = "";
if(empty($sort)){
        $tampil = $perpus->lihat();
}
if (isset($_POST["judul"]) )
{
    $sort =  $_POST["judul"]; 
    $tampil = $perpus->lihat_sorting($sort,"judul_buku");  
}
if (isset($_POST["penulis"]) )
{
    $sort =  $_POST["penulis"]; 
    $tampil = $perpus->lihat_sorting($sort,"penulis_buku"); 
}
if (isset($_POST["penerbit"]) )
{
    $sort =  $_POST["penerbit"]; 
    $tampil = $perpus->lihat_sorting($sort,"penerbit_buku"); 
}
if (isset($_POST["tahun_terbit"]) )
{
    $sort =  $_POST["tahun_terbit"]; 
    $tampil = $perpus->lihat_sorting($sort,"tahun_terbit");   
}
if (isset($_POST["stok"]) )
{
    $sort =  $_POST["stok"]; 
    $tampil = $perpus->lihat_sorting($sort,"stok");    
}
if(isset($_POST['submit'])){
    $cari = $_POST['cari'];
    $column =  $_POST['jenis'];
    if($cari!="" AND $column!=""){
        $tampil = $perpus->lihat_filter($cari,$column);
    }
    
}
while($data = $tampil->fetch_object()){
?>
<tr>
    <th><?php echo $no++ ?></th>
    <td><?php echo $data->judul_buku; ?></td>
    <td><?php echo $data->penulis_buku; ?></td>
    <td><?php echo $data->penerbit_buku; ?></td>
    <td><?php echo $data->tahun_terbit; ?></td>
    <td><?php echo $data->stok; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>