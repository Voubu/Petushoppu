<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "link.php"; ?>
</head>

<?php

// Jika form disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $hasilJasa = mysqli_real_escape_string($conn, $_POST['hasilJasa']);
    $hasilPenjualan = mysqli_real_escape_string($conn, $_POST['hasilPenjualan']);
    $jasaTerlaku = mysqli_real_escape_string($conn, $_POST['jasaTerlaku']);
    $barangTerlaku = mysqli_real_escape_string($conn, $_POST['barangTerlaku']);
    $barangTerjual = mysqli_real_escape_string($conn, $_POST['barangTerjual']);
    $totalPendapatan = mysqli_real_escape_string($conn, $_POST['totalPendapatan']);

    // Simpan data ke database
    $query = "INSERT INTO pembukuan (tanggal, hasilJasa, hasilPenjualan, jasaTerlaku, barangTerlaku, barangTerjual, totalPendapatan) VALUES ('$tanggal', '$hasilJasa', '$hasilPenjualan', '$jasaTerlaku', '$barangTerlaku', '$barangTerjual', $totalPendapatan)";
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
    $idRekor = mysqli_real_escape_string($conn, $_POST['idRekor']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $hasilJasa = mysqli_real_escape_string($conn, $_POST['hasilJasa']);
    $hasilPenjualan = mysqli_real_escape_string($conn, $_POST['hasilPenjualan']);
    $jasaTerlaku = mysqli_real_escape_string($conn, $_POST['jasaTerlaku']);
    $barangTerlaku = mysqli_real_escape_string($conn, $_POST['barangTerlaku']);
    $barangTerjual = mysqli_real_escape_string($conn, $_POST['barangTerjual']);
    $totalPendapatan = mysqli_real_escape_string($conn, $_POST['totalPendapatan']);

    // Simpan data ke database
    $query = "UPDATE pembukuan SET tanggal = '$tanggal', hasilJasa = '$hasilJasa', hasilPenjualan = '$hasilPenjualan', jasaTerlaku = '$jasaTerlaku', barangTerlaku = '$barangTerlaku', barangTerjual = '$barangTerjual', totalPendapatan = '$totalPendapatan' WHERE idRekor = '$idRekor'";

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
    $idRekor = mysqli_real_escape_string($conn, $_POST['idRekor']);

    $query = "DELETE FROM pembukuan WHERE idRekor = '$idRekor'";
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
                        <a class="btn " data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="color: white; background-color: black;">
                                <i class="fas fa-plus-square"></i> Tambah Data Pembukuan
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exp_date">Tanggal:</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hasilJasa">Hasil dari pelayanan jasa:</label>
                                        <input type="number" class="form-control" id="hasilJasa" name="hasilJasa" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="hasilPenjualan">Hasil penjualan (IDR):</label>
                                        <input type="number" class="form-control" id="hasilPenjualan" name="hasilPenjualan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jasaTerlaku">Pelayanan jasa paling laku:</label>
                                        <input type="text" class="form-control" id="jasaTerlaku" name="jasaTerlaku" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="barangTerlaku">Barang paling laku:</label>
                                        <input type="text" class="form-control" id="barangTerlaku" name="barangTerlaku" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="barangTerjual">Jumlah barang terjual:</label>
                                        <input type="number" class="form-control" id="barangTerjual" name="barangTerjual" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="totalPendapatan">Total Pendapatan (IDR):</label>
                                        <input type="number" class="form-control" id="totalPendapatan" name="totalPendapatan" required>
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
                            <h6 class="m-0 font-weight-bold" style="color:#f88f8f;">Data Pembukuan Harian</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataX" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Hasil Jasa (IDR)</th>
                                            <th>Hasil Penjualan Barang (IDR)</th>
                                            <th>Jasa Terlaku</th>
                                            <th>Barang Terlaku</th>
                                            <th>Barang Terjual</th>
                                            <th>Total Pendapatan (IDR)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $conn->prepare("SELECT * FROM pembukuan");
                                        $stmt->execute();
                                        $makanan = $stmt->get_result();
                                        ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($makanan as $data) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= htmlspecialchars($data['tanggal']); ?></td>
                                                <td><?= htmlspecialchars($data['hasilJasa']); ?></td>
                                                <td><?= htmlspecialchars($data['hasilPenjualan']); ?></td>
                                                <td><?= htmlspecialchars($data['jasaTerlaku']); ?></td>
                                                <td><?= htmlspecialchars($data['barangTerlaku']); ?></td>
                                                <td><?= htmlspecialchars($data['barangTerjual']); ?></td>
                                                <td><?= htmlspecialchars($data['totalPendapatan']); ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal<?= $data['idRekor'] ?>">Edit</a>
                                                    <br><br>
                                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?= $data['idRekor'] ?>">Hapus</a>
                                                </td>
                                            </tr>

                                            <!-- Modal Edit Record -->
                                            <div class="modal fade" id="editModal<?= $data['idRekor']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                                                                <input type="hidden" name="idRekor" value="<?= $data['idRekor']; ?>">
                                                                <div class="form-group">
                                                                    <label for="exp_date">Tanggal</label>
                                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tanggal']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jumlah">Hasil dari Pelayanan Jasa</label>
                                                                    <input type="number" class="form-control" id="hasilJasa" name="hasilJasa" value="<?= $data['hasilJasa']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jenis">Hasil dari Penjualan Barang</label>
                                                                    <input type="number" class="form-control" id="hasilPenjualan" name="hasilPenjualan" value="<?= $data['hasilPenjualan']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="waktu_masuk">Jasa paling laku</label>
                                                                    <input type="text" class="form-control" id="jasaTerlaku" name="jasaTerlaku" value="<?= $data['jasaTerlaku']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="waktu_masuk">Barang paling laku</label>
                                                                    <input type="text" class="form-control" id="barangTerlaku" name="barangTerlaku" value="<?= $data['barangTerlaku']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="waktu_masuk">Jumlah Barang Terjual</label>
                                                                    <input type="number" class="form-control" id="barangTerjual" name="barangTerjual" value="<?= $data['barangTerjual']; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="waktu_masuk">Total Pemasukan</label>
                                                                    <input type="number" class="form-control" id="totalPendapatan" name="totalPendapatan" value="<?= $data['totalPendapatan']; ?>" required>
                                                                </div>
                                                                <button type="submit" name="edit" class="btn btn-primary w-100">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapusModal<?= $data['idRekor'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Record Pembukuan</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus salah satu record pembukuan?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <form action="" method="post">
                                                                <input type="hidden" name="idRekor" value="<?= $data['idRekor'] ?>">
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