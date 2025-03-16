<?php
include ("database.php");
session_start();

// check if student is loged in
if (!isset($_SESSION['student_logged_in']) || $_SESSION['student_logged_in'] !== true) {
    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>baraton uiversity</title>

    <style>
        #body{
            background-color: white;
            background-image: linear-gradient(rgba(93, 93, 92, 0.883),
                            rgba(0, 0, 169, 0.686), 
                            rgba(17, 0, 175, 0.875)), 
                            url(images/grad_hat.jpeg);
            background-attachment: fixed;
        }
        #in{
            color: black;
            border: 0;
            background: 0;
            border-bottom: 2px solid;

        }
        .division{
            font-family: 'Times New Roman', Times, serif;
            padding: 10%;
            padding-top: 2%;
            align-items: center;
            width: 65%;
            float: left;
            margin-left: 10px;
            margin-left: 10px ;
            margin-bottom: 150px;
            margin-top: 20px;
            color: black;
            background-color: white;
            height: auto;
        
        }
        .aside{
            width: 30%;
            font-family: serif;
            margin-right: auto;
            float: right;
            border: 4px solid burlywood;
            padding: 5%;
            padding-top: 2%;
            height: 500px;
        }
        strong{
            color: black;
        }
       #image{
        width: 20px;
        cursor: pointer;
        margin-left: 20px;

       }
            
        .dropdown{
            pad: 10px;
        }
        .dropdown a{
            display: block;
            color: black;
        }
        .dropdown .content{
            display: none;
            margin-left: 20px;
            box-shadow: 3px 3px 5px;
            font-weight: bold;
            position: absolute;
            background-color: hsl(0, 0%, 55%);
        }
        .dropdown:hover .image{
            transform: rotateZ(360deg);
            transition-duration: 300ms;
        }
        .dropdown:hover .content{
            display: block;
        }
        .dropdown a:hover{
            color:  rgba(189, 99, 3, 0.724);
                    }


    </style>
    
</head>


<body  id="body">
    <header>
        <img src="images/hlogo.JPEG" alt="Baraton Logo" height="100px">
    </header>

    <div class="dropdown">
        <img id="image" class="image" src="images/menu.ico" alt="">

        <div class="content">
            <a href="index.php"><img id="image" src="images/home.ico" alt="">&nbsp; HOME</a>
            <a href="suprequest.php"><img id="image" src="images/exam.ico" alt="">&nbsp; SUPPLIMENTARY</a>
            <hr>
            <a href="logout.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOUT</a>

        </div>

    </div>
    


    <fieldset class="division">
        <h3><small>UNDERGRADUATE GRADUATION APPLICATION AND AGREEMENT</small></h3><br>
            <form action="request.php" method="POST">

                Date: <?php  echo"".date('d-m-y'); ?><br>
                Name: <input id="in" type="text" name="f_name" placeholder="FIRST" required> &nbsp;
                <input id="in" type="text" name="m_name" placeholder="MIDDLE" > &nbsp;
                <input id="in" type="text" name="l_name" placeholder="LAST" required> &nbsp;<br><br>

                UEAB ID: <input id="in" type="text" name="s_id"><br><br>
                Degree and Major: <textarea  id="in" name="major" rows="1" cols="63%" required></textarea><br><br>

                <b>COURSES YET TO BE COMPLETED AT UEAB. <br></b>
                <small>Enter the courses yet to be complete in the format illustrtated:</small><br>

               <br> <b>Semester 1:</b>
                <textarea id="in" class="input" name="sem1" rows="4" cols="50" required placeholder="Course code: Name: Credi"></textarea><br><br>

                <br> <b>Semester 2:</b>
                <textarea id="in" class="input"  name="sem2" rows="4" cols="50" required placeholder="Course code: Name: Credi"></textarea><br><br>

                <br> <b>Intersemester:</b>
                <textarea id="in" class="input"  name="sem3" rows="4" cols="50" placeholder="Course code: Name: Credi"></textarea><br><br>

                <b>YOUR CONTACTS</b><br>
                Home Postal Address: <input id="in" type="text" name="adress"><br><br>
                Phone: <input type="text" name="phone" id="in"><br><br>
                Mobile Phone: <input type="text" name="mobile" id="in"><br><br>
                E-Mail: <input type="text" name="email" id="in">&nbsp;
                Fax: <input type="text" name="fax" id="in"> <br><br><br><br>


                <b>PARENT'S/ GUARDIAN'S CONTACTS</b><br>
                Home Postal Address: <input id="in" type="text" name="p_adress"><br><br>
                Phone: <input type="text" name="p_phone" id="in"><br><br>
                Mobile Phone: <input type="text" name="p_mobile" id="in"><br><br>
                E-Mail: <input type="text" name="p_email" id="in">&nbsp;
                Fax: <input type="text" name="p_fax" id="in"> <br><br>


                <input id="sbtn" type="submit" value="Send Request" >
            </form>
    </fieldset>

    <aside class="aside" id="aside">
        <h3>TERMS AND CONDITIONS</h3>
        <ul>
            <li>I hereby petition to graduatein the year 20<?php $year= date('y') +1; echo $year; ?>. 
                I know that the responsibility for reaching the degree requirements rest with me</li>
            <li><b>
                I will make no changes in this program without the approval of my advisor and the registrar's office
            </b></li>
        </ul>
        <?php
            // Retrieve and display pending approval requests
            $pendingRequests = getPendingApprovalRequests();
            if (!empty($pendingRequests)) {
            echo "<h2>Pending Graduation Requests</h2> <br> ";
            echo "<ol>";
            foreach ($pendingRequests as $request) {
            echo "<li>Requester: " . $request['F_Name'] . "<br>";
            echo "Requeter ID: " . $request['S_ID'] . "<br>"; ;
            echo "Major: " . $request['major'] . "<br></li>";

            }
            echo "</ol>";
            } else {
            echo "<p>No pending approval requests.</p>";
            }
        ?>
      
    </aside>






</body>
</html>

<?php


// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data

    $f_name =$_POST['f_name']; 
    $m_name = $_POST['m_name']; 
    $l_name = $_POST['l_name'];
    $s_id = $_POST['s_id'];
    $major= $_POST['major']; 
    $sem1= $_POST['sem1'];
    $sem2= $_POST['sem2'];
    $sem3= $_POST['sem3'];
    $adress= $_POST['adress'];
    $phone= $_POST['phone'];
    $mobile= $_POST['mobile'];
    $email= $_POST['email'];
    $fax= $_POST['fax'];
    $p_adress= $_POST['p_adress'];
    $p_phone= $_POST['p_phone'];
    $p_mobile= $_POST['p_mobile'];
    $p_email= $_POST['p_email'];
    $p_fax= $_POST['p_fax'];

    
    // Submit the approval request
    try{
                
        $sql = "INSERT INTO grad VALUES ( '$f_name', '$m_name', '$l_name', '$s_id', '$major', 
                                    '$sem1', '$sem2', '$sem3', '$adress', '$phone', '$mobile', 
                                    '$email', '$fax', '$p_adress', '$p_phone', '$p_mobile', '$p_email', '$p_fax', 'pending')";
    
        mysqli_query($conn,$sql);
    }
    catch(mysqli_sql_exception){
        echo 'Graduation application for '. $f_name. " already exists";
        
    }
           
}
// Function to retrieve pending approval requests
function getPendingApprovalRequests()
{
        // prepare and Execute the query
    global $conn; 
    $sql = "SELECT * FROM grad WHERE status = 'pending'";

    $result = $conn->query($sql);

    // Check if there are any pending requests
    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}



mysqli_close($conn);

?>