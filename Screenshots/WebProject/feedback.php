<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required /><br>
        <input type="password" name="password" placeholder="Password" required /><br>
        <input type="submit" name="login" value="Login" />
    </form>

    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Connect to the MySQL server
        $conn = new mysqli("localhost", "your_username", "your_password", "your_database");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute a query to retrieve the user's password hash
        $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Fetch the password hash from the result set
            $row = $result->fetch_assoc();
            $hash = $row['password'];

            // Verify the password
            if (password_verify($password, $hash)) {
                // Password is correct, do further actions (e.g., redirect to a dashboard page)
                echo "Login successful!";
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Invalid username or password.";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>