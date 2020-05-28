<?php
    include("../../function/koneksi.php");
    include("../../function/helper.php");

    adminOnly($level, "banner");

    $link = $_POST['link'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    $edit_gambar = "";

    $banner = isset($_POST["banner"]) ? $_POST["banner"] : "";
    $status = isset($_POST["status"]) ? $_POST["status"] : "";
    $button = isset($_POST["button"]) ? $_POST["button"] : $_GET["button"];
	
 
    if($_FILES["file"]["name"] != "")
    {
        $nama_file = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/slide/" . $nama_file);
         
        $edit_gambar  = ", gambar='$nama_file'";
    }
     
    if($button == "Add")
    {
        mysqli_query($conn, "INSERT INTO banner (banner, link, gambar, status) VALUES ('$banner', '$link', '$nama_file', '$status')");
    }
    elseif($button == "Update")
    {
	    $banner_id = $_GET['banner_id'];
		
        mysqli_query($conn, "UPDATE banner SET banner='$banner',
                                        link='$link',
                                        $edit_gambar
                                        status='$status'
										$edit_gambar WHERE banner_id='$banner_id'");
    } 
    else if ($button == 'delete') {
        $banner_id = $_GET["banner_id"];
        mysqli_query($conn, "DELETE FROM banner WHERE banner_id='$banner_id'");
    }
    
    header("location: ".BASE_URL."index.php?page=my_profile&module=banner&action=list");
?>