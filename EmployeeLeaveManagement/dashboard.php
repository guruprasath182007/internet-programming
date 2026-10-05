<?php

session_start();

if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Employee Dashboard</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

<h2>Employee Leave Management</h2>

<div>
<a href="dashboard.php">Dashboard</a>
<a href="apply_leave.php">Apply Leave</a>
<a href="my_leaves.php">My Leaves</a>
<a href="logout.php">Logout</a>
</div>

</div>

<div class="container">

<h1>Welcome, <?php echo $_SESSION['name']; ?></h1>

<div class="cards">

<div class="card">

<h3>Apply Leave</h3>

<p>Submit a new leave request.</p>

<a href="apply_leave.php" class="btn">
Apply
</a>

</div>

<div class="card">

<h3>My Leaves</h3>

<p>View your leave requests and status.</p>

<a href="my_leaves.php" class="btn">
View
</a>

</div>

</div>

</div>

</body>
</html>