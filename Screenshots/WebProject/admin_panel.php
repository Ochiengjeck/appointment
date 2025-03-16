<?php
session_start();
include ("database.php");

// check if student is loged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();

}

// Function to retrieve pending approval requests
function getPendingGraduation()
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
// Function to retrieve pending approval requests
function getPendingSuplementary()
{
        // prepare and Execute the query
    global $conn; 
    $sql = "SELECT * FROM sup WHERE status = 'pending'";

    $result = $conn->query($sql);

    // Check if there are any pending requests
    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Example usage
$pendingGradRequests = getPendingGraduation();
$pendingSupRequests = getPendingSuplementary();

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
        h2,h3{
            color: blue;
            margin: auto;
            padding-left: 20px;
        }
        #div{
            border: 2px solid;
            margin: 20px;
            padding: 20px;
            font-family: 'Times New Roman', Times, serif;
            float: left;
            border-radius: 10px;
            box-shadow: 2px 2px 5px black;
            background-color: skyblue;

        }
        .sup{
            float: left;
            width: 40%;
            margin: 20px;
        }
        .grad{
            width: 40%;
            float: right;
            margin: 20px;
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
                <h1>UNIVERSITY OF EASTERN AFRICA BARATON</h1>
                <h1>Pending Requests</h1>

                <hr>
    </header>

        <!-- Logout button -->
        <div>
            
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post">
       
    <div class="dropdown">
        <img id="image" class="image" src="images/menu.ico" alt="">

        <div class="content">
            <a href="index.php"><img id="image" src="images/home.ico" alt="">&nbsp; HOME</a>
            <a href="approve.php"><img id="image" src="images/exam.ico" alt="">&nbsp; APPROVE</a>
            <hr>
            <a href="logout.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOUT</a>

        </div>

    </div>
       
        </form>
        </div>
        
        <div class="grad">
            <!-- Display pending approval requests -->
            <b>Graduation Requests :</b>
            <?php if (!empty($pendingGradRequests)): ?>
                <ul>
                    <?php foreach ($pendingGradRequests as $request): ?>
                        <div id="div">    

                            <li>
                                <strong>Requester:</strong> <?php echo $request['F_Name']; ?>&nbsp;
                                 <?php echo $request['L_Name']; ?><br>
                                <strong>Major:</strong> <?php echo $request['major']; ?><br>
                                </form>
                            </li>
                        </div>

                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No pending approval requests.</p><br>
            <?php endif; ?>


        </div>

        <div class="sup">
            <!-- Display pending approval requests -->
            <b>Supplementary Requests :</b> 
            <?php if (!empty($pendingSupRequests)): ?>
                <ul>
                    <?php foreach ($pendingSupRequests as $request): ?>
                        <div id="div">    

                            <li>
                                <strong>Requester:</strong> <?php echo $request['f_name']; ?>&nbsp;
                                 <?php echo $request['l_name']; ?><br>
                                <strong>Major:</strong> <?php echo $request['major']; ?><br>
                                </form>
                            </li>
                        </div>

                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No pending approval requests.</p><br>
            <?php endif; ?>

        </div>

            
    
</body>
</html>

<?php
if (isset($_POST["f_name"])){
    header("Location: approve.php");}

?>