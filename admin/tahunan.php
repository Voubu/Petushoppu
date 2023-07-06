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
    $id_makanan = mysqli_real_escape_string($conn, $_POST['id_makanan']);
    $exp_date = mysqli_real_escape_string($conn, $_POST['exp_date']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
    $waktu_masuk = mysqli_real_escape_string($conn, $_POST['waktu_masuk']);

    // Simpan data ke database
    $query = "UPDATE makanan SET exp_date = '$exp_date', jumlah = '$jumlah', jenis = '$jenis', waktu_masuk = '$waktu_masuk' WHERE id_makanan = '$id_makanan'";

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
    $id_makanan = mysqli_real_escape_string($conn, $_POST['id_makanan']);

    $query = "DELETE FROM makanan WHERE id_makanan = '$id_makanan'";
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
                    
                    <!-- Content Row -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pembukuan Tahunan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataX" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tahun</th>
                                            <th>Hasil Jasa (IDR)</th>
                                            <th>Hasil Penjualan Barang (IDR)</th>
                                            <th>Total Barang Terjual</th>
                                            <th>Total Penjualan Tahunan (IDR)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $stmt = $conn->prepare("SELECT YEAR(tanggal) AS tanggal, SUM(hasilJasa) AS hasilJasa, SUM(hasilPenjualan) AS hasilPenjualan, SUM(barangTerjual) AS barangTerjual, SUM(totalPendapatan) AS totalPendapatan FROM pembukuan GROUP BY YEAR(tanggal); ");
                                        $stmt->execute();
                                        $record = $stmt->get_result();
                                        ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($record as $data) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= htmlspecialchars($data['tanggal']); ?></td>
                                                <td><?= htmlspecialchars($data['hasilJasa']); ?></td>
                                                <td><?= htmlspecialchars($data['hasilPenjualan']); ?></td>
                                                <td><?= htmlspecialchars($data['barangTerjual']); ?></td>
                                                <td><?= htmlspecialchars($data['totalPendapatan']); ?></td>
                                            </tr>
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