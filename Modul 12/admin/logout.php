<?php
    session_start();

    unset($_SESSION['user_id']);
    unset($_SESSION['nama']);
    unset($_SESSION['level']);

    session_destroy();
    
    header("location: ../index.php");

?>
