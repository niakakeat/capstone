<?php
require 'database.php';
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve sale data from POST request
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];

    // Insert sale data into the database
    $sql = "INSERT INTO tblsales (product, quantity, amount) VALUES ('$product', '$quantity', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "Sale recorded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
