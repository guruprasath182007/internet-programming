<?php

include "db_connect.php";

$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>

    <title>View Orders - NIKE</title>

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        header {
            background: #111;
            color: white;
            padding: 20px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h2 {
            margin: 0;
        }

        header a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            width: 90%;
            margin: 40px auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .table-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px #ccc;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #111;
            color: white;
            padding: 13px;
        }

        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f5f5f5;
        }

        .total {
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 25px;
            background: #111;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #333;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

    </style>

</head>

<body>

<header>

    <h2>NIKE</h2>

    <div>
        <a href="index.html">Home</a>
        <a href="order.html">Place Orders</a>
    </div>

</header>

<div class="container">

    <h1>Order Details</h1>

    <div class="table-box">

        <?php if ($result->num_rows > 0) { ?>

        <table>

            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Amount</th>
                <th>Order Date</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()) { ?>

            <tr>

                <td><?php echo $row["order_id"]; ?></td>

                <td><?php echo htmlspecialchars($row["customer_name"]); ?></td>

                <td><?php echo htmlspecialchars($row["product_name"]); ?></td>

                <td><?php echo $row["quantity"]; ?></td>

                <td>₹<?php echo number_format($row["price"], 2); ?></td>

                <td class="total">
                    ₹<?php
                    echo number_format(
                        $row["quantity"] * $row["price"],
                        2
                    );
                    ?>
                </td>

                <td><?php echo $row["order_date"]; ?></td>

            </tr>

            <?php } ?>

        </table>

        <?php } else { ?>

            <div class="empty">
                No orders have been placed yet.
            </div>

        <?php } ?>

        <a href="order.html" class="btn">PLACE ANOTHER ORDER</a>

    </div>

</div>

</body>
</html>

<?php
$conn->close();
?>