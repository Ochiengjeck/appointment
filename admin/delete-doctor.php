<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_GET){
        //import database
        include("../connection.php");
        $id=$_GET["id"];
        $result001= $database->query("select * from lecturer where lecid=$id;");
        $email=($result001->fetch_assoc())["lecemail"];
        $sql= $database->query("delete from webuser where email='$email';");
        $sql= $database->query("delete from lecturer where lecemail='$email';");
        //print_r($email);
        header("location: lecturers.php");
    }


?>