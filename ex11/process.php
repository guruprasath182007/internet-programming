<?php

// ==============================
// DATABASE CONNECTION
// ==============================

$host = "localhost";
$user = "root";
$pass = "mysql";
$db   = "shopping_db";

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("MySQL Connection Failed: " . $conn->connect_error);
}


// ==============================
// CHECK FORM SUBMISSION
// ==============================

if (isset($_POST["submit"])) {

    $customer_name = trim($_POST["customer_name"]);
    $product_name  = trim($_POST["product_name"]);
    $quantity      = $_POST["quantity"];
    $price         = $_POST["price"];


    // ==============================
    // VALIDATION
    // ==============================

    if ($customer_name == "") {
        die("Customer name is required.");
    }

    if ($product_name == "") {
        die("Product name is required.");
    }

    if (!is_numeric($quantity) || $quantity <= 0) {
        die("Please enter a valid quantity.");
    }

    if (!is_numeric($price) || $price < 0) {
        die("Please enter a valid price.");
    }


    // ==============================
    // INSERT INTO ORDERS TABLE
    // ==============================

    $sql = "INSERT INTO orders
            (customer_name, product_name, quantity, price)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("SQL Error: " . $conn->error);
    }


    $quantity = (int)$quantity;
    $price = (float)$price;


    $stmt->bind_param(
        "ssid",
        $customer_name,
        $product_name,
        $quantity,
        $price
    );


    // ==============================
    // EXECUTE
    // ==============================

    if ($stmt->execute()) {

?>

<!DOCTYPE html>
<html>

<head>

    <title>Order Successful</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .box {
            width: 450px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 0 15px #aaa;
        }

        h1 {
            color: green;
        }

        .details {
            text-align: left;
            background: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
            line-height: 2;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background: #0056b3;
        }

    </style>

</head>

<body>

<div class="box">

    <h1>✓ Order Placed Successfully!</h1>

    <div class="details">

        <b>Customer Name:</b>
        <?php echo htmlspecialchars($customer_name); ?>

        <br>

        <b>Product Name:</b>
        <?php echo htmlspecialchars($product_name); ?>

        <br>

        <b>Quantity:</b>
        <?php echo $quantity; ?>

        <br>

        <b>Price:</b>
        ₹<?php echo number_format($price, 2); ?>

    </div>

    <a href="index.php">
        Place Another Order
    </a>

</div>

</body>

</html>

<?php

    } else {

        echo "Insert Error: " . $stmt->error;

    }

    $stmt->close();

}

$conn->close();

?>