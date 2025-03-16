<?php
session_start();
include ("database.php");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = $_POST['id'];

    // Update data in the database
    $_approveGrad = "UPDATE `grad` SET `status` = 'approved' WHERE `grad`.`S_ID` = '$id';";
    $_approveSup = "UPDATE `sup` SET `status` = 'approved' WHERE `sup`.`s_id` = '$id';";
    

    if ($conn->query($_approveGrad) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    if ($conn->query($_approveSup) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql = "SELECT * FROM grad WHERE status = 'pending'";
$sql1 = "SELECT * FROM sup WHERE status = 'pending'";

// Execute the query
$grad = $conn->query($sql);
$sup = $conn->query($sql1);


// Store the retrieved data in an array
$grads = [];
if ($grad->num_rows > 0) {
    while ($row = $grad->fetch_assoc()) {
        $grads[] = $row;
    }
}
$sups = [];
if ($grad->num_rows > 0) {
    while ($row = $sup->fetch_assoc()) {
        $sups[] = $row;
    }
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
        color: black;
    }
    h2{
        color: blue;
    }
    #div{
        border: 2px solid;
        margin: 20px;
        padding: 20px;
        font-family: 'Times New Roman', Times, serif;
        float: left;

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


<body id="body">
    
    <header style="background: rgba(255, 255, 255, 0);">
        <img class="logo" src="images/logo.png" alt="Baraton Logo"><br>
                <h1>UNIVERSITY OF EASTERN AFRICA BARATON</h1><br>
                <hr>
    </header>


    </head>

    <div class="dropdown">
        <img id="image" class="image" src="images/menu.ico" alt="">

        <div class="content">
            <a href="index.php"><img id="image" src="images/home.ico" alt="">&nbsp; HOME</a>
            <a href="admin_panel.php"><img id="image" src="images/exam.ico" alt="">&nbsp; REQUESTS</a>
            <hr>
            <a href="logout.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOUT</a>

        </div>

    </div>
    




        <div id="div">
            <h2>Graduation Requests</h2><br>
            <hr><br>
            <table>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Major</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($grads as $user): ?>
                    <tr>
                        <form action="approve.php" method="POST">
                            <td><?php echo $user['F_Name']. " ". " " .$user['L_Name']; ?></td>
                            <td><input type="text" name="id" value="<?php echo $user['S_ID']; ?>"></td>
                            <td><input type="text" name="major" value="<?php echo $user['major']; ?>"></td>
                            <td><input type="submit" value="Approve"></td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        
        <div id="div">
            <h2>Suplimentary Requests</h2><br>
            <hr><br>
            <table>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Major</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($sups as $user): ?>
                    <tr>
                        <form action="approve.php" method="POST">
                            <td><?php echo $user['f_name']. " ". " " .$user['l_name']; ?></td>
                            <td><input type="text" name="id" value="<?php echo $user['s_id']; ?>"></td>
                            <td><input type="text" name="major" value="<?php echo $user['major']; ?>"></td>
                            <td><input type="submit" value="Approve"></td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

</body>   
</html>