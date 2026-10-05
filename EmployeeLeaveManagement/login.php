<?php

session_start();

include "dbconnect.php";

$message = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employees
            WHERE username='$username'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        $_SESSION['employee_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: dashboard.php");
        }

        exit();

    } else {

        $message = "Invalid username or password";

    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="login-box">

<h2>Employee Login</h2>

<form method="POST">

<input type="text"
       name="username"
       placeholder="Username"
       required>

<input type="password"
       name="password"
       placeholder="Password"
       required>

<button type="submit" name="login">
Login
</button>

</form>

<p class="error">
<?php echo $message; ?>
</p>

<a href="index.php">Back to Home</a>

</div>

</body>
</html>