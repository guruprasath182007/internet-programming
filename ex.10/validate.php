<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $name = trim($_POST["name"]);
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $qualification = trim($_POST["qualification"]);
    $skills = trim($_POST["skills"]);
    $job = trim($_POST["job"]);
    $ccnumber = trim($_POST["ccnumber"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);

    $errors = array();

    if (strlen($username) < 3) {
        $errors[] = "Username must contain at least 3 characters.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must contain at least 6 characters.";
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[] = "Name should contain only letters.";
    }

    if ($gender == "") {
        $errors[] = "Please select your gender.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone number must contain exactly 10 digits.";
    }

    if (!preg_match("/^[0-9]{13,19}$/", $ccnumber)) {
        $errors[] = "Credit card number must contain 13 to 19 digits.";
    }

    if (empty($errors)) {

        echo "<h2>Registration Successful!</h2>";
        echo "<p><b>Username:</b> " . htmlspecialchars($username) . "</p>";
        echo "<p><b>Name:</b> " . htmlspecialchars($name) . "</p>";
        echo "<p><b>Date of Birth:</b> " . htmlspecialchars($dob) . "</p>";
        echo "<p><b>Gender:</b> " . htmlspecialchars($gender) . "</p>";
        echo "<p><b>Qualification:</b> " . htmlspecialchars($qualification) . "</p>";
        echo "<p><b>Skills:</b> " . htmlspecialchars($skills) . "</p>";
        echo "<p><b>Preferred Job:</b> " . htmlspecialchars($job) . "</p>";
        echo "<p><b>Email:</b> " . htmlspecialchars($email) . "</p>";
        echo "<p><b>Phone:</b> " . htmlspecialchars($phone) . "</p>";

    } else {

        echo "<h2>Registration Failed</h2>";
        echo "<ul>";

        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }

        echo "</ul>";
        echo "<a href='register.html'>Go Back</a>";
    }
}
?>