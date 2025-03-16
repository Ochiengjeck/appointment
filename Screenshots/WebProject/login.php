<?php
    session_start();
    include ("database.php");
?>

<!DOCTYPE html>

<html lang="en">
        
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Log In Page</title>
    </head>

    <body class="body">
        <header style="background-color: rgba(255, 255, 255, 0);">
        <img class="logo" src="images/logo.png" alt="Baraton Logo"><br>
            <h1>UNIVERSITY OF EASTERN AFRICA BARATON</h1>
          
        </header>
        
        <div class="field">
            <div>
            <label><em><strong >Login To Your Account</strong></em></label> <br><br>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>"method = "post">

            <label for="username">Student ID:</label>
            <input class="input" type="text" name="s_id" required placeholder="STUDENT ID" default=""><br><br>

            <label for="password">Password:</label>
            <input class="input" type="password" name="password" required default=""><br><br>
           
            <input id="btn" type="submit" name="login" value="LOGIN"><br><br>
            <label id="question">Dont have an Account? <a href="signup.php">Sign Up here.</a></label><br>

            </form> 
            </div>
    </div>
        
    </body>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $_SESSION["s_id"]= $user = $_POST["s_id"];
        $_SESSION["password"]= $password = $_POST["password"];

        $sql = "SELECT PASSWORD FROM `users` WHERE S_ID = '$user'";
        $hashed = mysqli_query($conn,$sql);
        foreach($hashed as $x){
            foreach($x as $hashed){

            }
        }    
        if(password_verify($password, $hashed)){ 
            $_SESSION['student_logged_in'] = true;
            header('Location:index.php');
            exit();
        }
        elseif(!password_verify($password, $confirm)){
            echo'account does not exist';
        }
    
        
       
    }
    mysqli_close($conn);
    ?>
</html>