<?php
require 'database.php';
$sql = "SELECT DATE(sale_date) as sale_date, SUM(quantity) as total_quantity, SUM(amount) as total_revenue FROM tblsales GROUP BY DATE(sale_date)";
$result = $conn->query($sql);

$labels = [];
$quantity = [];
$revenue = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $labels[] = $row['sale_date'];
        $quantity[] = $row['total_quantity'];
        $revenue[] = $row['total_revenue'];
    }
}

// Return data as JSON
echo json_encode([
    'labels' => $labels,
    'quantity' => $quantity,
    'revenue' => $revenue
]);

$conn->close();
?>
