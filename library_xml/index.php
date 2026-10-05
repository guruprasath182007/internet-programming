<!DOCTYPE html>
<html>
<head>
    <title>Library Book Details</title>

    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f5f0e8;
        color: #333;
    }

    .container {
        width: 85%;
        margin: 50px auto;
        background: #fffdf9;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 3px 12px rgba(70, 45, 25, 0.15);
    }

    h1 {
        text-align: center;
        color: #6b4226;
        margin-bottom: 8px;
    }

    .description {
        text-align: center;
        color: #806f61;
        margin-bottom: 28px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background-color: #6b4226;
        color: white;
        padding: 14px;
        text-align: left;
    }

    td {
        padding: 13px 14px;
        border-bottom: 1px solid #ddd2c5;
    }

    tr:nth-child(even) {
        background-color: #faf6f0;
    }

    tr:hover {
        background-color: #eee2d3;
    }

    td:first-child {
        font-weight: bold;
        color: #6b4226;
    }

    .price {
        color: #4d7c59;
        font-weight: bold;
    }

    .footer {
        text-align: center;
        margin-top: 25px;
        color: #8a7b70;
        font-size: 13px;
    }
</style>
</head>

<body>

<div class="container">

    <h1>Library Book Details</h1>

    <p class="description">
        List of books available in the library
    </p>

    <?php

    $xml = simplexml_load_file("books.xml")
        or die("Error: Cannot load XML file.");

    echo "<table>";

    echo "<tr>";
    echo "<th>Book Title</th>";
    echo "<th>Author</th>";
    echo "<th>Year</th>";
    echo "<th>Price</th>";
    echo "</tr>";

    foreach ($xml->book as $book) {

        echo "<tr>";

        echo "<td>" . $book->title . "</td>";
        echo "<td>" . $book->author . "</td>";
        echo "<td>" . $book->year . "</td>";
        echo "<td class='price'>$" . $book->price . "</td>";

        echo "</tr>";
    }

    echo "</table>";

    ?>

    <div class="footer">
        Data loaded from books.xml using PHP
    </div>

</div>

</body>
</html>