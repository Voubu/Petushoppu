<?php

include('../functions.php');

// Fetch the top selling petshop goods data from the database
$sql = "SELECT barangTerlaku, COUNT(*) AS quantity FROM pembukuan GROUP BY barangTerlaku ORDER BY quantity DESC LIMIT 5";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'label' => $row['barangTerlaku'],
            'quantity' => $row['quantity']
        ];
    }
}

$conn->close();

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
