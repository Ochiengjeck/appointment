<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    
    if($_POST){
        //import database
        include("../connection.php");
        $title=$_POST["title"];
        $lecid=$_POST["lecid"];
        $nop=$_POST["nop"];
        $date=$_POST["date"];
        $time=$_POST["time"];
        $sql="insert into schedule (lecid,title,scheduledate,scheduletime,nop) values ($lecid,'$title','$date','$time',$nop);";
        $result= $database->query($sql);
        header("location: schedule.php?action=session-added&title=$title");
        
    }


?>