<?php
session_start();

// Check if the admin is already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin_panel.php");
    exit();
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Admin Login</title>
    
    <script>
        // A script to set the password and usename value to empy
        window.addEventListener(
            'DOMContentLoaded',
            function(){
                var input =document.getElementById('username');
                var input =document.getElementById('password');

                usernameInput.value = "";
                passwordInput.value = "";

            });
    </script>
</head>

<body class="body">
    <header style="background: rgba(255, 255, 255, 0);">
    <img class="logo" src="images/logo.png" alt="Baraton Logo"><br>
            <h1>UNIVERSITY OF EASTERN AFRICA BARATON</h1>
    </header>
    <fieldset class="field">
        <legend><strong>Admin Login....</strong></legend>
        <form action="admin_login.php" method="POST">
            <label for="username">Username:</label>
            <input class="input" type="text" id="username" name="admin" autocomplete="off" required ><br><br>

            <label for="password">Password:</label>
            <input class="input" type="password" id="password" name="password" autocomplete="off" required><br><br>

            <input id="btn" type="submit" name="login" value="LOGIN"><br><br>
            <label id="question">Are you a student ..? <a href="login.php">Login here.</a></label><br>

        </form>
    </fieldset>

</body>
</html>

<?php
// if not, check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Authenticate the admin (Replace with your authentication logic)
    $adminUsername = $_POST['admin'];
    $adminPassword = $_POST['password'];

    // Perform admin authentication
    if ($adminUsername === 'admin' && $adminPassword === 'password') {
        // Set admin session variable
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_panel.php");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }
}

?>