<?php
    include('connect.php');
    
    $nama=mysqli_real_escape_string($conn, $_POST['nama']);
    $jenis=mysqli_real_escape_string($conn, $_POST['jenis']);
    $alamat=mysqli_real_escape_string($conn, $_POST['alamat']);
    $status=mysqli_real_escape_string($conn, $_POST['select']);
    
    mysqli_query($conn,"INSERT INTO `data_pasien` (namaPasien,jenis,alamat,status) VALUES ('$nama','$jenis','$alamat','$status')");
    header('location:pendataan_pasien.php');
     
?>