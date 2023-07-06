<?php

include('../functions.php');

// Fetch the weekly sales data from the database
$sql = "SELECT YEAR(tanggal) AS year, WEEK(tanggal) AS week, SUM(hasilPenjualan) AS totalSales
        FROM pembukuan
        GROUP BY YEAR(tanggal), WEEK(tanggal)
        ORDER BY YEAR(tanggal), WEEK(tanggal)";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'label' => 'Week ' . $row['week'] . ' - ' . $row['year'],
            'sales' => $row['totalSales']
        ];
    }
}

$conn->close();

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($data);

?>



