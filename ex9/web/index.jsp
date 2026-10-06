<!DOCTYPE html>
<html>
<head>

    <title>Nike Online Store</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #111;
        }

        header {
            background: #111;
            color: white;
            padding: 20px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 32px;
            font-weight: bold;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 30px;
            font-size: 16px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .hero {
            text-align: center;
            padding: 70px 20px;
            background: white;
        }

        .hero h1 {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 20px;
            color: #555;
            margin-bottom: 30px;
        }

        .shop-btn {
            display: inline-block;
            background: #111;
            color: white;
            padding: 15px 35px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
        }

        .shop-btn:hover {
            background: #333;
        }

        .products {
            padding: 50px;
            text-align: center;
        }

        .products h2 {
            font-size: 32px;
            margin-bottom: 30px;
        }

        .product-container {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }

        .product {
            background: white;
            width: 250px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px #ddd;
        }

        .product .shoe {
            font-size: 70px;
            margin-bottom: 15px;
        }

        .product h3 {
            margin-bottom: 10px;
        }

        .price {
            font-weight: bold;
            margin-bottom: 15px;
        }

        footer {
            background: #111;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 30px;
        }

    </style>

</head>

<body>

<header>

    <div class="logo">NIKE</div>

    <nav>
        <a href="index.jsp">Home</a>
        <a href="OrderForm.jsp">Shop</a>
        <a href="ViewOrders.jsp">Orders</a>
    </nav>

</header>

<section class="hero">

    <h1>JUST DO IT.</h1>

    <p>
        Discover the latest Nike footwear and sportswear.
    </p>

    <a href="OrderForm.jsp" class="shop-btn">
        SHOP NOW
    </a>

</section>

<section class="products">

    <h2>Featured Products</h2>

    <div class="product-container">

        <div class="product">
            <div class="shoe">&#128095;</div>
            <h3>Nike Air Max 270</h3>
            <p>Running Shoes</p>
            <div class="price">&#8377;8,995</div>
        </div>

        <div class="product">
            <div class="shoe">&#128095;</div>
            <h3>Nike Air Force 1</h3>
            <p>Casual Shoes</p>
            <div class="price">&#8377;7,495</div>
        </div>

        <div class="product">
            <div class="shoe">&#128095;</div>
            <h3>Nike Revolution 7</h3>
            <p>Running Shoes</p>
            <div class="price">&#8377;4,295</div>
        </div>

        <div class="product">
            <div class="shoe">&#128095;</div>
            <h3>Nike Pegasus 41</h3>
            <p>Running Shoes</p>
            <div class="price">&#8377;11,895</div>
        </div>

    </div>

</section>
<footer>

    <p>© 2026 Nike Online Shopping System</p>

</footer>

</body>
</html>