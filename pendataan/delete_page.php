<?php
    $id=$_GET['id'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/styleEdit.css?refreshcss=1" type="text/css">
  </head>
  
  <body>
    <div id="y">
        <h2>Yakin kah?</h2>
        <div class="wrapper">
            <form action="delete.php?id=<?php echo $id; ?>" method="POST" class="optionly">
                <input type="submit" class="option" id="option-1" method="POST" value="Ya">
            </form>
            <button onclick="location.href='pendataan_pasien.php'" name="select" class="option" id="option-2">Tidak</button>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script>
        $('#option-1').click(function() {
            $.load('.../delete.php', function(e){
                console.log(e);
            });
        });
    </script>
  </body>
</html>