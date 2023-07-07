<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Petshop - Login Admin</title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>

<?php
session_start();
include '../functions.php';

// cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_reporting(0);
    // mengambil data dari form login
    $username = $_POST["username"];
    $password = $_POST["password"];

    // melindungi dari SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // mencari user di database
    $sql = "SELECT * FROM admin WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    // verifikasi password
    if (password_verify($password, $user['password'])) {
        // jika password benar, redirect ke halaman dashboard
        $_SESSION["admin"] = true;
        $_SESSION["username"] = $username;
        header("Location: ./index.php");
        exit();
    } else {
        // jika password salah, tampilkan pesan error
        $error = "Username atau password salah";
    }
}
?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5 rounded-lg">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Petshop - Login Admin</h1>
                                        <img src="../img/logo.png" class="img-fluid mb-4" width="100" alt="">
                                    </div>
                                    <form class="user" method="POST" action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user rounded-pill bg-light py-3 px-4" name="username" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user rounded-pill bg-light py-3 px-4" name="password" placeholder="Password" required>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block rounded-pill">
                                            Login
                                        </button>
                                    </form>
                                    <?php if (isset($error)) { ?>
                                        <div class="text-center mt-3">
                                            <span class="text-danger"><?= $error; ?></span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="text-center py-3 fixed-bottom bg-white">
        <div class="container">
            <p class="m-0">Copyright &copy; Petshop <?= date('Y'); ?></p>
        </div>
    </footer>

    <?php include "plugin.php"; ?>

</body>

</html>
