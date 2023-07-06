<?php
    include('../functions.php');
    $id=$_GET['id'];
    
    $nama=mysqli_real_escape_string($conn, $_POST['nama']);
    $jenis=mysqli_real_escape_string($conn, $_POST['jenis']);
    $alamat=mysqli_real_escape_string($conn, $_POST['alamat']);
    $status=mysqli_real_escape_string($conn, $_POST['select']);
    
    mysqli_query($conn,"UPDATE `data_pasien` SET namaPasien='$nama', jenis='$jenis', alamat='$alamat', status='$status' WHERE idPasien='$id'");
    header('location:pendataan_pasien.php');
?>