<?php

//import database
include("../connection.php");



if($_POST){
    //print_r($_POST);
    $result= $database->query("select * from webuser");
    $name=$_POST['name'];
    $oldemail=$_POST["oldemail"];
    $idnumber=$_POST['idnumber'];
    $spec=$_POST['spec'];
    $email=$_POST['email'];
    $tele=$_POST['Tele'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $id=$_POST['id00'];
    
    if ($password==$cpassword){
        $error='3';
        $result= $database->query("select lecturer.lecid from lecturer inner join webuser on lecturer.lecemail=webuser.email where webuser.email='$email';");
        //$resultqq= $database->query("select * from lecturer where lecid='$id';");
        if($result->num_rows==1){
            $id2=$result->fetch_assoc()["lecid"];
        }else{
            $id2=$id;
        }
        
        echo $id2."jdfjdfdh";
        if($id2!=$id){
            $error='1';
            //$resultqq1= $database->query("select * from lecturer where lecemail='$email';");
            //$did= $resultqq1->fetch_assoc()["lecid"];
            //if($resultqq1->num_rows==1){
                
        }else{

            //$sql1="insert into lecturer(lecemail,lecname,lecpassword,lecidnumber,lectel,specialties) values('$email','$name','$password','$idnumber','$tele',$spec);";
            $sql1="update lecturer set lecemail='$email',lecname='$name',lecpassword='$password',lecidnumber='$idnumber',lectel='$tele',specialties=$spec where lecid=$id ;";
            $database->query($sql1);

            $sql1="update webuser set email='$email' where email='$oldemail' ;";
            $database->query($sql1);

            echo $sql1;
            //echo $sql2;
            $error= '4';
            
        }
        
    }else{
        $error='2';
    }


    
    
}else{
    //header('location: signup.php');
    $error='3';
}


header("location: settings.php?action=edit&error=".$error."&id=".$id);
?>

