<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<!DOCTYPE html>

<html>

<head>

    <title>Nike - Shop Now</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        header {
            background: #111;
            color: white;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
        }

        header a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
        }

        .container {
            width: 700px;
            max-width: 95%;
            margin: 40px auto;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #ccc;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        textarea {
            resize: vertical;
        }

        .row {
            display: flex;
            gap: 15px;
        }

        .row div {
            flex: 1;
        }

        .price-box {
            background: #f1f1f1;
            padding: 15px;
            margin-top: 20px;
            border-radius: 7px;
            font-size: 18px;
        }

        .btn {
            width: 100%;
            margin-top: 25px;
            padding: 14px;
            background: #111;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn:hover {
            background: #333;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

    </style>

    <script>

        function updatePrice() {

            var product =
                document.getElementById("productName").value;

            var price = 0;

            if (product === "Nike Air Max 270") {
                price = 8995;
            }
            else if (product === "Nike Air Force 1") {
                price = 7495;
            }
            else if (product === "Nike Revolution 7") {
                price = 4295;
            }
            else if (product === "Nike Pegasus 41") {
                price = 11895;
            }

            document.getElementById("price").value = price;

            calculateTotal();
        }

        function calculateTotal() {

            var price =
                parseFloat(
                    document.getElementById("price").value
                ) || 0;

            var quantity =
                parseInt(
                    document.getElementById("quantity").value
                ) || 0;

            var total = price * quantity;

            document.getElementById("total").innerHTML =
                "Total: ₹" + total.toFixed(2);
        }

    </script>

</head>

<body>

<header>

    <h1>NIKE</h1>

    <div>
        <a href="index.jsp">Home</a>
        <a href="ViewOrders.jsp">Orders</a>
    </div>

</header>

<div class="container">

    <h2>Place Your Nike Order</h2>

    <%
        String errorMessage =
            (String) request.getAttribute("errorMessage");

        if (errorMessage != null) {
    %>

        <div class="error">
            <%= errorMessage %>
        </div>

    <%
        }
    %>

    <form action="AddOrderServlet" method="post">

        <label>Customer Name</label>

        <input type="text"
               name="customerName"
               placeholder="Enter your name"
               required>


        <label>Select Product</label>

        <select name="productName"
                id="productName"
                onchange="updatePrice()"
                required>

            <option value="">-- Select Product --</option>

            <option value="Nike Air Max 270">
                Nike Air Max 270
            </option>

            <option value="Nike Air Force 1">
                Nike Air Force 1
            </option>

            <option value="Nike Revolution 7">
                Nike Revolution 7
            </option>

            <option value="Nike Pegasus 41">
                Nike Pegasus 41
            </option>

        </select>


        <label>Category</label>

        <select name="category" required>

            <option value="">-- Select Category --</option>

            <option value="Running Shoes">
                Running Shoes
            </option>

            <option value="Casual Shoes">
                Casual Shoes
            </option>

            <option value="Sports Shoes">
                Sports Shoes
            </option>

        </select>


        <div class="row">

            <div>

                <label>Size</label>

                <select name="size" required>

                    <option value="">Select Size</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>

                </select>

            </div>


            <div>

                <label>Color</label>

                <select name="color" required>

                    <option value="">Select Color</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Red">Red</option>
                    <option value="Blue">Blue</option>

                </select>

            </div>

        </div>


        <label>Quantity</label>

        <input type="number"
               name="quantity"
               id="quantity"
               min="1"
               value="1"
               onchange="calculateTotal()"
               onkeyup="calculateTotal()"
               required>


        <label>Price</label>

        <input type="number"
               name="price"
               id="price"
               readonly
               required>


        <div class="price-box">

            <div id="total">
                Total: ₹0.00
            </div>

        </div>


        <label>Order Date</label>

        <input type="date"
               name="orderDate"
               required>


        <label>Delivery Address</label>

        <textarea name="address"
                  rows="4"
                  placeholder="Enter delivery address"
                  required></textarea>


        <button type="submit" class="btn">
            PLACE NIKE ORDER
        </button>

    </form>

</div>

</body>

</html>