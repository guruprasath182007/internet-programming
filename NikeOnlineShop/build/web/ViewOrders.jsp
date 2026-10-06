<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%@ page import="java.util.List" %>
<%@ page import="com.nike.model.Order" %>
<%@ page import="com.nike.dao.OrderDAO" %>

<!DOCTYPE html>

<html>

<head>

    <title>Nike Orders</title>

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        header {
            background: #111;
            color: white;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            width: 95%;
            margin: 40px auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .new-order {
            display: inline-block;
            background: #111;
            color: white;
            padding: 12px 22px;
            text-decoration: none;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .table-container {
            overflow-x: auto;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 3px 12px #ddd;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background: #111;
            color: white;
            padding: 13px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        tr:hover {
            background: #f5f5f5;
        }

        .total {
            font-weight: bold;
        }

    </style>

</head>

<body>

<header>

    <h1>NIKE</h1>

    <div>
        <a href="index.jsp">Home</a>
        <a href="OrderForm.jsp">Shop</a>
    </div>

</header>


<div class="container">

    <h2>NIKE ORDER DETAILS</h2>

    <a href="OrderForm.jsp" class="new-order">
        + Place New Order
    </a>

    <div class="table-container">

        <table>

            <tr>

                <th>Order ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Category</th>
                <th>Size</th>
                <th>Color</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
                <th>Date</th>
                <th>Address</th>

            </tr>

            <%

                OrderDAO dao = new OrderDAO();

                List<Order> orders =
                    dao.getAllOrders();

                for (Order o : orders) {

            %>

            <tr>

                <td>
                    <%= o.getOrderId() %>
                </td>

                <td>
                    <%= o.getCustomerName() %>
                </td>

                <td>
                    <%= o.getProductName() %>
                </td>

                <td>
                    <%= o.getCategory() %>
                </td>

                <td>
                    <%= o.getSize() %>
                </td>

                <td>
                    <%= o.getColor() %>
                </td>

                <td>
                    <%= o.getQuantity() %>
                </td>

                <td>
                    ₹<%= o.getPrice() %>
                </td>

                <td class="total">
                    ₹<%= o.getTotalAmount() %>
                </td>

                <td>
                    <%= o.getOrderDate() %>
                </td>

                <td>
                    <%= o.getAddress() %>
                </td>

            </tr>

            <%

                }

            %>

        </table>

    </div>

</div>

</body>

</html>