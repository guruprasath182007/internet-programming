<?php

session_start();

include "dbconnect.php";

if (!isset($_SESSION['employee_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_POST['apply'])) {

    $employee_id = $_SESSION['employee_id'];
    $leave_type = $_POST['leave_type'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $reason = $_POST['reason'];

    if ($from_date > $to_date) {

        $message = "To date must be after From date.";

    } else {

        $sql = "INSERT INTO leaves
                (employee_id, leave_type, from_date, to_date, reason)
                VALUES
                ('$employee_id',
                 '$leave_type',
                 '$from_date',
                 '$to_date',
                 '$reason')";

        if (mysqli_query($conn, $sql)) {

            $message = "Leave application submitted successfully.";

        } else {

            $message = "Error submitting leave.";

        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Apply Leave</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

<h2>Employee Leave Management</h2>

<a href="dashboard.php">Dashboard</a>
<a href="my_leaves.php">My Leaves</a>
<a href="logout.php">Logout</a>

</div>

<div class="form-box">

<h2>Apply for Leave</h2>

<form method="POST" onsubmit="return validateLeave()">

<label>Leave Type</label>

<select name="leave_type" required>

<option value="">Select Leave Type</option>

<option value="Casual Leave">Casual Leave</option>

<option value="Sick Leave">Sick Leave</option>

<option value="Earned Leave">Earned Leave</option>

</select>

<label>From Date</label>

<input type="date"
       name="from_date"
       id="from_date"
       required>

<label>To Date</label>

<input type="date"
       name="to_date"
       id="to_date"
       required>

<label>Reason</label>

<textarea name="reason"
          placeholder="Enter reason"
          required></textarea>

<button type="submit" name="apply">
Submit Leave
</button>

</form>

<p class="success">
<?php echo $message; ?>
</p>

</div>

<script src="script.js"></script>

</body>
</html>