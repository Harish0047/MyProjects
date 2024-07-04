<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize user input to prevent SQL injection (you should use prepared statements for production)
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM admin_users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error executing the query: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        // Fetch the company ID for later use (you might want to store this in a session)
        $row = $result->fetch_assoc();
        $studentId = $row['id'];

        // Store the company ID in a session variable
        session_start();
        $_SESSION['admin_id'] = $adminId;

        // Redirect to the company dashboard or another page
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Invalid login, redirect back to login page with an error message
        header("Location: admin_login.php?error=1");
        exit();
    }
}

$conn->close();
?>