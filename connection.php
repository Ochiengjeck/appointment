<?php

    $database= new mysqli("localhost","root","maraclara2002","appointment");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>