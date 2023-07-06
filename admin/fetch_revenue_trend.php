<?php

include('../functions.php');

// Fetch the revenue trend data from the database on a weekly basis
$sql = "SELECT CONCAT('Minggu ', WEEK(tanggal)) AS week_label, SUM(totalPendapatan) AS weekly_revenue
        FROM pembukuan
        GROUP BY WEEK(tanggal)
        ORDER BY tanggal ASC";
$result = $conn->query($sql);

// Prepare an array to store the data
$data = array();

// Check if the query was successful
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

// Set the response header to JSON
header('Content-Type: application/json');

// Return the data as JSON
echo json_encode($data);

?>