<?php
    session_start();
    include ("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>sign up</title>
</head>
<body class="body" >
    <header style="background: rgba(255, 255, 255, 0);">
    <img class="logo" src="images/logo.png" alt="Baraton Logo"><br>
            <h1>UNIVERSITY OF EASTERN AFRICA BARATON</h1>
    </header>

    <fieldset class="field">
        <legend><strong>Create An Account....</strong></legend>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>"method = "post">
                Username: 
                <input class="input" id="input" type="text" name="f_name" required placeholder="FIRST NAME"><br>
                <input class="input" id="input" type="text" name="l_name" required placeholder="LAST NAME"><br>
                <input class="input" id="input" type="text" name="m_name" required placeholder="MIDDLE NAME"><br><br>

                Student ID:
                <input class="input" type="text" name="s_id" required ><br><br>
                
                E-Mail: 
                <input class="input" type="email" name="mail" required placeholder="example@ueab.ac.ke"><br><br>
                
                Password: <input class="input" type="password" name="password" required minlength="8"><br><br>                
                Confirm Password: <input class="input" type="password" name="confirm" required minlength="8"><br><br>

                <input id="sbtn" type="submit" name="submit" value="Register">
                <input id="sbtn" type="reset" value="Reset"><br><br>
                <label id="question">You already have an account ?? <a href="login.php">Login here</a></label>
        </form>
    </fieldset>
   
</body>
</html>



<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
        if ($_POST["password"] == $_POST["confirm"]){

            $f_name= $_SESSION['f_name']= filter_input(INPUT_POST,"f_name",FILTER_SANITIZE_SPECIAL_CHARS);
            $m_name= $_SESSION["m_name"]= filter_input(INPUT_POST,"m_name",FILTER_SANITIZE_SPECIAL_CHARS);
            $l_name= $_SESSION["l_name"]= filter_input(INPUT_POST,"l_name",FILTER_SANITIZE_SPECIAL_CHARS);

            $s_id= $_SESSION["s_id"]= filter_input(INPUT_POST,"s_id",FILTER_SANITIZE_SPECIAL_CHARS);

            $password = $_SESSION["password"]= filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
            $mail = $_SESSION["e-mail"]= filter_input(INPUT_POST, "mail", FILTER_SANITIZE_EMAIL);
            

            $hash = password_hash($password,PASSWORD_DEFAULT);

            try{
                
                $sql ="INSERT INTO users (User, L_Name, M_Name, S_ID, email, password)
                        VALUES('$f_name','$l_name','$m_name','$s_id','$mail','$hash')";
            
                mysqli_query($conn,$sql);
                header("Location: index.php");
            }
            catch(mysqli_sql_exception){
                echo 'user exists';
                
            }
        }

        else{
            echo 'The password dont march';
        }
    

}
    mysqli_close($conn);
?>