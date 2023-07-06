<?php

    $id=$_GET['id'];
    include('connect.php');
    mysqli_query($conn,"delete FROM `data_pasien` WHERE idPasien='$id'");
    header('location:pendataan_pasien.php');
    
?>