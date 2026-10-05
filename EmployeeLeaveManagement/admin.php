<?php

session_start();

include "dbconnect.php";

if (!isset($_SESSION['employee_id']) ||
    $_SESSION['role'] != 'admin') {

    header("Location: login.php");
    exit();
}

$sql = "SELECT leaves.*, employees.name, employees.department
        FROM leaves
        JOIN employees
        ON leaves.employee_id = employees.id
        ORDER BY leaves.applied_on DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

<h2>Admin Dashboard</h2>

<a href="logout.php">Logout</a>

</div>

<div class="container">

<h2>Employee Leave Requests</h2>

<table>

<tr>

<th>Employee</th>
<th>Department</th>
<th>Leave Type</th>
<th>From</th>
<th>To</th>
<th>Reason</th>
<th>Status</th>
<th>Action</th>

</tr>

<?php

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['department']; ?></td>

<td><?php echo $row['leave_type']; ?></td>

<td><?php echo $row['from_date']; ?></td>

<td><?php echo $row['to_date']; ?></td>

<td><?php echo $row['reason']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>

<a class="approve"
   href="update_leave.php?id=<?php echo $row['id']; ?>&status=Approved">

Approve

</a>

<a class="reject"
   href="update_leave.php?id=<?php echo $row['id']; ?>&status=Rejected">

Reject

</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>
</html>