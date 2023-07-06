<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link.php"; ?>
    <link rel="stylesheet" href="../css/styleEdit.css" type="text/css">
</head>

<?php

// Jika form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $namaPasien = mysqli_real_escape_string($conn, $_POST['namaPasien']);
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $status = mysqli_real_escape_string($conn, $_POST['select']);

    // Simpan data ke database
    $query = "INSERT INTO data_pasien (namaPasien, jenis, alamat, status) VALUES ('$namaPasien', '$jenis', '$alamat', '$status')";
    if (mysqli_query($conn, $query)) {
        $script = "
            Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Ditambahkan!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
    } else {
        $script = "
            Swal.fire({
                icon: 'error',
                title: 'Data Gagal Ditambahkan!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
    }
}

if (isset($_POST['edit'])) {
    // Ambil data dari form
    $idPasien = mysqli_real_escape_string($conn, $_POST['idPasien']);
    $namaPasien = mysqli_real_escape_string($conn, $_POST['namaPasien']);
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Simpan data ke database
    $query = "UPDATE data_pasien SET namaPasien = '$namaPasien', jenis = '$jenis', alamat = '$alamat', status = '$status' WHERE idPasien = '$idPasien'";

    if (mysqli_query($conn, $query)) {
        $script = "
            Swal.fire({
                icon: 'success',
                title: 'Data Berhasil di Edit!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
    } else {
        $script = "
            Swal.fire({
                icon: 'error',
                title: 'Data Gagal Di-Edit!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
    }
}

if (isset($_POST['hapus'])) {
    // Ambil data dari form
    $idPasien = mysqli_real_escape_string($conn, $_POST['idPasien']);

    $query = "DELETE FROM data_pasien WHERE idPasien = '$idPasien'";
    if (mysqli_query($conn, $query)) {
        $script = "
            Swal.fire({
                icon: 'success',
                title: 'Data Berhasil Dihapus!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
    } else {
        $script = "
            Swal.fire({
                icon: 'error',
                title: 'Data Gagal Di-Hapus!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        ";
    }
}

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "sidebar.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-plus-square"></i> Tambah Data Pasien
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="namaPasien">Nama Pasien:</label>
                                        <input type="text" class="form-control" id="namaPasien" name="namaPasien" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jenis:</label>
                                        <input type="text" class="form-control" id="jenis" name="jenis" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis">Alamat:</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status:</label>                                    
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
                                    <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- Content Row -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle" id="dataX" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Jenis</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $conn->prepare("SELECT * FROM data_pasien");
                                        $stmt->execute();
                                        $pasien = $stmt->get_result();
                                        ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pasien as $data) : ?>
                                            <tr>
                                                <td class="align-middle"><?= $i; ?></td>
                                                <td class="align-middle"><?= htmlspecialchars($data['namaPasien']); ?></td>
                                                <td class="align-middle"><?= htmlspecialchars($data['jenis']); ?></td>
                                                <td class="align-middle"><?= htmlspecialchars($data['alamat']); ?></td>
                                                <td class="align-middle">
                                                    <?php 
                                                        if ($data['status'] == 1){
                                                            echo '<div class"hijau" style="background: #50c76b; color: white; margin: 0; padding: 0; border-radius: 12px; text-align: center; font-size: 1.6rem;"><p>Sudah</p></div>';
                                                        } else{
                                                            echo '<div class"merah" style="background: #e86473; color: white; margin: 0; padding: 0; text-align: center; border-radius: 12px; font-size: 1.6rem;"><p>Belum</p></div>';
                                                        };
                                                    ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="edit.php?id=<?php echo $data['idPasien'];?>" class="link-dark" onclick="toggle()" ><ion-icon name="create-outline" style="color: #3f63a7; font-size: 2em; z-index: 1;">"</ion-icon></a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="#" data-toggle="modal" data-target="#hapusModal<?= $data['idPasien'] ?>"><ion-icon name="trash" style="color: #eb4343; font-size: 2em; z-index: 1;"></ion-icon></a>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit Pasien -->
                                            <div class="modal fade" id="editModal<?= $data['idPasien']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="idPasien" value="<?= $data['idPasien']; ?>">
                                                                <div class="form-group">
                                                                    <label for="namaPasien">Nama Pasien</label>
                                                                    <input type="text" class="form-control" id="namaPasien" name="namaPasien" value="<?= $data['namaPasien']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jenis">Jenis</label>
                                                                    <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $data['jenis']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="status">Status:</label>                                    
                                                                </div>
                                                                <div class="wrapper">
                                                                    <input type="radio" name="status" id="edit-option-1" value="1">
                                                                    <input type="radio" name="status" id="edit-option-2" value="0"> 
                                                                    <label for="option-1" class="option option-1">
                                                                        <span>Sudah</span>
                                                                    </label>
                                                                    <label for="option-2" class="option option-2">
                                                                        <span>Belum</span>
                                                                    </label>
                                                                </div>
                                                                <button type="submit" name="edit" class="btn btn-primary w-100">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapusModal<?= $data['idPasien'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pasien</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data dengan ID Pasien: <b><?= htmlspecialchars($data['idPasien']) ?></b>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <form action="" method="post">
                                                                <input type="hidden" name="idPasien" value="<?= $data['idPasien'] ?>">
                                                                <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php $i++; ?>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "footer.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include "plugin.php"; ?>

    <script>
        $(document).ready(function() {
            $('#dataX').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sLast": "Terakhir",
                        "sNext": "Selanjutnya",
                        "sPrevious": "Sebelumnya"
                    },
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "sSearch": "Cari:",
                    "sEmptyTable": "Tidak ada data yang tersedia dalam tabel",
                    "sLengthMenu": "Tampilkan _MENU_ data",
                    "sZeroRecords": "Tidak ada data yang cocok dengan pencarian Anda"
                }
            });
        });
    </script>

    <script>
        <?php if (isset($script)) {
            echo $script;
        } ?>
    </script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>