<?php
// Establish a connection to the MySQL database
include 'config.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform the SQL query with JOIN
$sql = "SELECT * FROM cart JOIN orders ON cart.name = orders.total_products";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Loop through the rows and output the data
    while ($row = $result->fetch_assoc()) {
        echo "Column from cart: " . $row['name_cart'] . "<br>";
        echo "Column from orders: " . $row['total_products_orders'] . "<br>";

    }
} else {
    echo "No rows found.";
}

// Close the connection
$conn->close();
?>