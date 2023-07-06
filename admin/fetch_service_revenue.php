<?php

include('../functions.php');

// Fetch the weekly service revenue data from the database
$sql = "SELECT YEAR(tanggal) AS year, WEEK(tanggal) AS week, SUM(hasilJasa) AS revenue FROM pembukuan GROUP BY YEAR(tanggal), WEEK(tanggal)";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'year' => $row['year'],
            'week' => $row['week'],
            'revenue' => $row['revenue']
        ];
    }
}

$conn->close();

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($data);

?>



