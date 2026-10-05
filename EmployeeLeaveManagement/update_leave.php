<?php

session_start();

include "dbconnect.php";

if (!isset($_SESSION['employee_id']) ||
    $_SESSION['role'] != 'admin') {

    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE leaves
        SET status='$status'
        WHERE id='$id'";

mysqli_query($conn, $sql);

header("Location: admin.php");

exit();

?>