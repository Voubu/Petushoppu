<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link.php"; ?>
    <style>
        .card-title,
        .card-subtitle,
        .card-text {
            color: white;
        }
    </style>
</head>

<?php

// Jika form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $hari = mysqli_real_escape_string($conn, $_POST['hari']);
    $waktu_mulai = mysqli_real_escape_string($conn, $_POST['waktu_mulai']);
    $waktu_selesai = mysqli_real_escape_string($conn, $_POST['waktu_selesai']);

    // Simpan data ke database
    $query = "INSERT INTO dokter (nama, hari, waktu_mulai, waktu_selesai) VALUES ('$nama', '$hari', '$waktu_mulai', '$waktu_selesai')";
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
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $hari = mysqli_real_escape_string($conn, $_POST['hari']);
    $waktu_mulai = mysqli_real_escape_string($conn, $_POST['waktu_mulai']);
    $waktu_selesai = mysqli_real_escape_string($conn, $_POST['waktu_selesai']);

    // Simpan data ke database
    $query = "UPDATE dokter SET nama = '$nama', hari = '$hari', waktu_mulai = '$waktu_mulai', waktu_selesai = '$waktu_selesai' WHERE id = '$id'";

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
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $query = "DELETE FROM dokter WHERE id = '$id'";
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
                                <i class="fas fa-plus-square"></i> Tambah Data Jadwal Praktik
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama">Nama:</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hari">Hari:</label>
                                        <input type="text" class="form-control" id="hari" name="hari" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu_mulai">Waktu Mulai:</label>
                                        <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu_selesai">Waktu Selesai:</label>
                                        <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" required>
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
                                <h6 class="m-0 font-weight-bold text-primary">Data Jadwal Praktik</h6>
                            </div>

                            <div class="card-body">
                                <div class="d-flex overflow-auto">
                                    <?php
                                    // Mendapatkan data dokter dari database
                                    $query = "SELECT id, nama, hari, waktu_mulai, waktu_selesai FROM dokter";
                                    $result = mysqli_query($conn, $query);

                                    // Daftar warna latar belakang card
                                    $colors = array("#fa9191", "#97db97", "#8a8adb", "#eba9eb", "#deb878", "#91e3e3");

                                    // Menghitung jumlah dokter
                                    $numDoctors = mysqli_num_rows($result);

                                    // Perulangan untuk menampilkan data dokter dalam card
                                    $i = 0;
                                    foreach ($result as $row) {
                                        $id = $row['id'];
                                        $nama = $row['nama'];
                                        $hari = $row['hari'];
                                        $waktu_mulai = $row['waktu_mulai'];
                                        $waktu_selesai = $row['waktu_selesai'];

                                        // Mengambil warna latar belakang card berdasarkan indeks perulangan
                                        $colorIndex = $i % count($colors);
                                        $background = $colors[$colorIndex];
                                    ?>
                                        <div class="card m-2" style="width: 220px; background-color: <?= $background; ?>;">
                                            <div class="card-body text-center">
                                                <h6 class="card-title"><?= $hari; ?></h6>
                                                <h6 class="card-subtitle mb-2"><?= $nama; ?></h6>
                                                <p class="card-text"><?= $waktu_mulai; ?> - <?= $waktu_selesai; ?></p>
                                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal<?= $id; ?>">Edit</button>
                                            </div>
                                        </div>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $id; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel<?= $id; ?>">Edit Dokter</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="">
                                                            <input type="hidden" name="id" value="<?= $id; ?>">
                                                            <div class="form-group">
                                                                <label for="nama<?= $id; ?>">Nama:</label>
                                                                <input type="text" class="form-control" id="nama<?= $id; ?>" name="nama" value="<?= $nama; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="hari<?= $id; ?>">Hari:</label>
                                                                <input type="text" class="form-control" id="hari<?= $id; ?>" name="hari" value="<?= $hari; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="waktu_mulai<?= $id; ?>">Waktu Mulai:</label>
                                                                <input type="time" class="form-control" id="waktu_mulai<?= $id; ?>" name="waktu_mulai" value="<?= $waktu_mulai; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="waktu_selesai<?= $id; ?>">Waktu Selesai:</label>
                                                                <input type="time" class="form-control" id="waktu_selesai<?= $id; ?>" name="waktu_selesai" value="<?= $waktu_selesai; ?>" required>
                                                            </div>
                                                            <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $i++;
                                    }

                                    // Jika tidak ada data dokter
                                    if ($numDoctors === 0) {
                                    ?>
                                        <div class="card m-2" style="width: 220px;">
                                            <div class="card-body">
                                                <p class="card-text">Tidak ada data dokter.</p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
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
</body>

</html>