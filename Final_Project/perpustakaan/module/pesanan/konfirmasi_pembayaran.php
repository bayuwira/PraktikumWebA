<?php
    $pesanan_id = isset($_GET['pesanan_id']) ? $_GET['pesanan_id'] : false;
?>

<form action="<?php echo BASE_URL . "module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="post">
    <div class="element-form">
        <label for="">Nomor Rekening</label>
        <span><input type="text" name="nomor_rekening" value=""></span>
    </div>
    <div class="element-form">
        <label>Nama Account</label>
        <span><input type="text" name="nama_account" value=""></span>
    </div>
    <div class="element-form">
        <label for="">Tanggal transfer(yyyy-mm-dd)</label>
        <span><input type="date" name="tanggal_transfer" value=""></span>
    </div>
    <div class="element-form">
        <span><input type="submit" name="button" value="konfirmasi"></span>
    </div>
</form>