<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link.php"; ?>
</head>

<?php

// Jika form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $exp_date = mysqli_real_escape_string($conn, $_POST['exp_date']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $waktu_masuk = mysqli_real_escape_string($conn, $_POST['waktu_masuk']);

    // Simpan data ke database
    $query = "INSERT INTO obat (exp_date, jumlah, jenis, waktu_masuk) VALUES ('$exp_date', '$jumlah', '$jenis', '$waktu_masuk')";
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
    $id_obat = mysqli_real_escape_string($conn, $_POST['id_obat']);
    $exp_date = mysqli_real_escape_string($conn, $_POST['exp_date']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $waktu_masuk = mysqli_real_escape_string($conn, $_POST['waktu_masuk']);

    // Simpan data ke database
    $query = "UPDATE obat SET exp_date = '$exp_date', jumlah = '$jumlah', jenis = '$jenis', waktu_masuk = '$waktu_masuk' WHERE id_obat = '$id_obat'";

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
    $id_obat = mysqli_real_escape_string($conn, $_POST['id_obat']);

    $query = "DELETE FROM obat WHERE id_obat = '$id_obat'";
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
                                <i class="fas fa-plus-square"></i> Tambah Data Obat
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exp_date">Tanggal Kadaluwarsa:</label>
                                        <input type="date" class="form-control" id="exp_date" name="exp_date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah:</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis">Nama / Jenis Obat:</label>
                                        <input type="text" class="form-control" id="jenis" name="jenis" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu_masuk">Waktu Masuk:</label>
                                        <input type="datetime-local" class="form-control" id="waktu_masuk" name="waktu_masuk" required>
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
                            <h6 class="m-0 font-weight-bold text-primary">Data Obat</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataX" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal Kadaluwarsa</th>
                                            <th>Jumlah</th>
                                            <th>Nama / Jenis Obat</th>
                                            <th>Waktu Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $conn->prepare("SELECT * FROM obat");
                                        $stmt->execute();
                                        $obat = $stmt->get_result();
                                        ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($obat as $data) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= htmlspecialchars($data['exp_date']); ?></td>
                                                <td><?= htmlspecialchars($data['jumlah']); ?></td>
                                                <td><?= htmlspecialchars($data['jenis']); ?></td>
                                                <td><?= htmlspecialchars($data['waktu_masuk']); ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal<?= $data['id_obat'] ?>">Edit</a>
                                                    <br><br>
                                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?= $data['id_obat'] ?>">Hapus</a>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit Obat -->
                                            <div class="modal fade" id="editModal<?= $data['id_obat']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                                                                <input type="hidden" name="id_obat" value="<?= $data['id_obat']; ?>">
                                                                <div class="form-group">
                                                                    <label for="exp_date">Tanggal Kadaluwarsa</label>
                                                                    <input type="date" class="form-control" id="exp_date" name="exp_date" value="<?= $data['exp_date']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jumlah">Jumlah</label>
                                                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jumlah']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jenis">Jenis Obat</label>
                                                                    <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $data['jenis']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="waktu_masuk">Waktu Masuk</label>
                                                                    <input type="datetime-local" class="form-control" id="waktu_masuk" name="waktu_masuk" value="<?= $data['waktu_masuk']; ?>" required>
                                                                </div>
                                                                <button type="submit" name="edit" class="btn btn-primary w-100">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapusModal<?= $data['id_obat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Obat</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data dengan ID Obat: <b><?= htmlspecialchars($data['id_obat']) ?></b>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <form action="" method="post">
                                                                <input type="hidden" name="id_obat" value="<?= $data['id_obat'] ?>">
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
</body>

</html>