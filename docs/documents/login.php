<?php
// Start the session
session_start();

// Connect to the database
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "login_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Secure the password input
    $pass = md5($pass); // Using MD5 for simplicity, but use more secure hashing in real applications

    // Query to check if the user exists
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $user; // Store username in session
        header("Location: welcome.php"); // Redirect to welcome page
    } else {
        echo "<p>Invalid username or password!</p>";
    }
}

$conn->close();
?>
