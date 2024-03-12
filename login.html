<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username/email and password are submitted
    if (isset($_POST['email'], $_POST['password'])) {
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
    } else {
        echo "Username/email and password are required!";
    }
}
?>
