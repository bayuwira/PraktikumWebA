<?php
$pesanan_id = $_GET["pesanan_id"];
$query = mysqli_query($conn,"SELECT * FROM pesanan WHERE pesanan_id='$pesanan_id'");
$row = mysqli_fetch_assoc($query);

$status = $row['status'];
?>

<form action="<?php echo BASE_URL . "module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="post">
    <div class="element-form">
        <label for="">Pesanan Id (Faktur Id)</label>
        <span><input readonly="true" type="text" name="pesanan_id" value="<?php echo $pesanan_id ?>"></span>
    </div>
    <div class="element-form">
        <label>Status</label>
        <span>
            <select name="status" id="">
            <?php 
                foreach ($arrayStatusPesanan as $key => $value) {
                    if($status == $key){
                        echo "<option selected='true' value='$key'>" . $value . "</option>";
                    }else{
                        echo "<option value='$key'>" . $value . "</option>";
                    }
                    
                }
            ?>
            </select>
        </span>
    </div>
    <div class="element-form">
        <span><input type="submit" name="button" value="edit"></span>
    </div>
</form>