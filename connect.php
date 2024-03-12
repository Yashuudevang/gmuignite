<?php
// Check if the registration form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die('Connection failed : ' . $conn->connect_error);
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        $stmt = $conn->prepare("INSERT INTO yashwanth (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $firstName, $lastName, $gender, $email, $hashed_password, $number);
        $stmt->execute();
        echo "Registration successful...";
        $stmt->close();
        $conn->close();
    }
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $con = new mysqli("localhost", "root", "", "test");
    if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
    }

    // Prepare and execute query
    $stmt = $con->prepare("SELECT * FROM yashwanth WHERE email = ?");
    if (!$stmt) {
        die("Error in prepare statement: " . $con->error);
    }
    
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        die("Error in execute statement: " . $stmt->error);
    }

    // Get results
    $stmt_result = $stmt->get_result();

    // Check if username/email exists in database
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        // Verify hashed password
        if (password_verify($password, $data['password'])) {
            echo "<h2>LOGIN SUCCESSFULLY</h2>";
            // Redirect to dashboard or another page upon successful login
            // header("Location: dashboard.php");
            // exit();
        } else {
            echo "<h3>INVALID EMAIL OR PASSWORD</h3>";
        }
    } else {
        echo "<h3>INVALID EMAIL OR PASSWORD</h3>";
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
}
?>
