<?php

session_start();

include "dbconnect.php";

if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['employee_id'];

$sql = "SELECT * FROM leaves
        WHERE employee_id='$id'
        ORDER BY applied_on DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>My Leaves</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

<h2>Employee Leave Management</h2>

<a href="dashboard.php">Dashboard</a>
<a href="apply_leave.php">Apply Leave</a>
<a href="logout.php">Logout</a>

</div>

<div class="container">

<h2>My Leave Applications</h2>

<table>

<tr>

<th>Leave Type</th>
<th>From</th>
<th>To</th>
<th>Reason</th>
<th>Status</th>

</tr>

<?php

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

<td><?php echo $row['leave_type']; ?></td>

<td><?php echo $row['from_date']; ?></td>

<td><?php echo $row['to_date']; ?></td>

<td><?php echo $row['reason']; ?></td>

<td>

<?php echo $row['status']; ?>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>
</html>