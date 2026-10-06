<?php

include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customer_name = trim($_POST["customer_name"]);
    $product_name = trim($_POST["product_name"]);
    $quantity = intval($_POST["quantity"]);
    $price = floatval($_POST["price"]);

    $sql = "INSERT INTO orders 
            (customer_name, product_name, quantity, price)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssid",
        $customer_name,
        $product_name,
        $quantity,
        $price
    );

    if ($stmt->execute()) {

        $stmt->close();
        $conn->close();

        // Go to orders page
        echo "<script>
                window.location.href = 'view_orders.php';
              </script>";

        exit();

    } else {

        echo "Error placing order: " . $stmt->error;
    }
}

?>