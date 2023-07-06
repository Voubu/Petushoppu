<?php
  include('../functions.php');
  $id=$_GET['id'];
  $query=mysqli_query($conn,"SELECT * FROM `data_pasien` WHERE idPasien='$id'");
  $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/styleEditOriginal.css?refreshcss=1" type="text/css">
  </head>
  
  <body>
    <div id="y">
      <span onclick="location.href='pendataan_pasien.php'" class="icon-close"><ion-icon name="close"></ion-icon></span>
      <h2>Edit</h2>
      <form method="POST" action="update.php?id=<?php echo $id; ?>">

        <div class="input-container ic1">
          <input id="firstname" class="input" type="text" value="<?php echo $row['namaPasien']; ?>" name="nama"/>
          <div class="cut cut-short"></div>
          <label for="firstname" class="placeholder">Nama</label>
        </div>
        <div class="input-container ic2">
          <input id="lastname" class="input" type="text" value="<?php echo $row['jenis']; ?>" name="jenis"/>
          <div class="cut cut-short"></div>
          <label for="lastname" class="placeholder">Jenis</label>
        </div>
        <div class="input-container ic2">
          <input id="email" class="input" type="text" value="<?php echo $row['alamat']; ?>" name="alamat"/>
          <div class="cut"></div>
          <label for="email" class="placeholder">Alamat</>
        </div>
        
        <div class="wrapper">
          <input type="radio" name="select" id="option-1" value="1">
          <input type="radio" name="select" id="option-2" value="0">
          <label for="option-1" class="option option-1">
            <span>Sudah</span>
          </label>
          <label for="option-2" class="option option-2">
            <span>Belum</span>
          </label>
        </div>

        <input type="submit" name="submit" class="submit" value="Submit">

      </form>
    </div>

    <!-- =========== Scripts =========  -->


    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>