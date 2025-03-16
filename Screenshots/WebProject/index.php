<?php
session_start();

// check if student is loged in
if (!isset($_SESSION['student_logged_in']) || $_SESSION['student_logged_in'] !== true) {
    $user = "";
    $log='<a href="admin_panel.php">Admin |</a>&nbsp;
    <html><a href="login.php">Login </a> </html> ';
    
}
else{
    $_SESSION['student_logged_in'] == true;
    $user = $_SESSION["s_id"];
    $log='<html><a href="logout.php">Logout </a> </html> ';
}
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
}
else{
    $user ='Admin';
    $log='<a href="admin_panel.php">Pannel |</a>&nbsp;
        <html><a href="logout.php">Logout </a> </html> ';


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

       img{
            float: left;
        }
        header{
            position: fixed;
            top: 0;
        }
    
        #footer a{
            text-decoration: underline;
            font-weight: bold;
        }

    
        .indiv:hover{
            border: 2px solid rgb(50, 50, 144);
            cursor: pointer;
        }
        .a:hover{
            text-shadow: 5px 5px 3px  rgb(102, 40, 1);
            cursor: pointer;
            color: yellowgreen;
          
        }
        .logo{
            height: 10px;
        }
        .nav{
            float: right;
            display: inline-flex;
        }
        .nav a{
            color: blue;
            margin: 20px auto;
            font-weight: bold;
        }
        .nav small{
            margin-top: 20px;
        }
        .nav a:hover{
            color: yellowgreen;
            text-decoration: underline;

        }
        .nav .profile{
            border-radius: 200px;
            margin-top: auto;
            margin-left: 20px;
            float: right;
            padding: 2px;
            border: 2px solid;
            display: flow-root;
            cursor: pointer;
        }
        #user{
            background-image: url(images/user.jpeg);
            background-size: contain;
            box-shadow: 2px 2px 4px black;
            width: 50px;
            height: 50px;
            margin-left: 5px;
            margin-right: 5px;
            float: right;
            border-radius: 200px;
            }

        #info{
            margin-top: 70px;
        }
 


    </style>
    
</head>


<body class="body" id="body">
    <header>
        <img id="home"  src="images/hlogo.JPEG" alt="Baraton Logo" height="50px">
        <div id="user">
        </div>

        <div class="nav">
            <small><a href="#info">Home |</a></small>&nbsp;
            <small><a href="#grad">Graduation |</a></small>&nbsp;
            <small><a href="#sup">Suplimentary |</a></small>&nbsp;
            <small><?php echo $log ?></small>&nbsp;&nbsp;
            <small><?php echo $user ?></small>&nbsp;&nbsp;

        
        </div>

       
    </header>

    <div class="division" id="info">
        <div class="indiv" id="iinfo">
            <br><br><h2><big>ABOUT UEAB </big></h2><br>
            <p style="margin: 10px auto; font-size:15px;">At the University of Eastern Africa, Baraton (UEAB), we are committed to providing a transformative 
            education that empowers our students to become competent, ethical, and responsible leaders. With a 
            rich heritage and a focus on academic excellence, UEAB has been at the forefront of shaping the minds 
            and futures of students for many years</p> <br>
            <a class="a" href=""><label for="enroll" style="margin-bottom: 5px ;"><b><big><pre>Learn More -></pre></big></b></label></a>
        </div>

    </div>
    <div class="division" id="links">
        <img src="images/grad.ico" alt="Graduation hat" height="90%">
        <h3>Graduation is NOT the End, <br>Its the Beginning</h3><br>
        <small>Senator Orrin Hatch</small>

    </div>

    <aside class="aside" id="aside">
        <img class="logo" src="images/logo.png" alt="university logo">
        <h2>The University of Eastern Africa, Baraton!</h2><br>

            <p>At the University of Eastern Africa, Baraton (UEAB), we are committed to providing a transformative 
            education that empowers our students to become competent, ethical, and responsible leaders. With a 
            rich heritage and a focus on academic excellence, UEAB has been at the forefront of shaping the minds 
            and futures of students for many years.</p><br>

            <p>Established in 1978, UEAB is a leading institution of higher learning located in the beautiful town of 
            Baraton, on the picturesque greens of Nandi County, in Kenya. Our university offers a diverse range of 
            undergraduate and postgraduate programs across various disciplines, ensuring that students have the 
            opportunity to explore their passions and develop the skills necessary to succeed in their chosen fields.</p><br>

            <p>Our academic programs are designed to foster critical thinking, creativity, and practical skills, preparing 
            students for the challenges and opportunities of the dynamic global landscape. We are proud to have a 
            distinguished faculty comprising experienced professors and professionals who are dedicated to imparting knowledge, 
            mentoring students, and conducting groundbreaking research.</p><br>

            <p>At UEAB, we understand the importance of a holistic education. In addition to our rigorous academic curriculum, 
            we offer a vibrant campus life that promotes personal growth, cultural enrichment, and extracurricular engagement. 
            Our students have access to a wide range of clubs, organizations, and sports facilities, fostering a sense of community, 
            leadership development, and well-roundedness.</p><br>

            <p>One of our core values at UEAB is our commitment to fostering spiritual growth. As a Seventh-day Adventist institution, we 
            place great emphasis on nurturing the spiritual lives of our students. We believe in providing an environment that encourages 
            the exploration of faith, values, and ethical principles, allowing students to develop a strong moral compass and a sense of purpose.</p><br>

            <p>UEAB takes pride in its state-of-the-art facilities, including well-equipped classrooms, modern laboratories, libraries, and 
            technology infrastructure. We continuously invest in our campus infrastructure to provide our students with an optimal 
            learning environment that promotes collaboration, innovation, and academic success.</p><br>

            <p>Our commitment to community service and social responsibility is deeply ingrained in our university culture. Through various 
            outreach programs, community partnerships, and service-learning opportunities, we encourage our students to actively contribute 
            to society and make a positive impact on the lives of others.</p><br>

            <p>As you navigate our website, you will discover more about the programs, faculty, campus life, and facilities that make UEAB 
            a vibrant and nurturing educational institution. Whether you are a prospective student, a parent, an alumni, or a member of 
            our community, we invite you to explore the University of Eastern Africa, Baraton and join us on a journey of academic 
            excellence, personal growth, and lifelong learning.</p><br>

            <p>Welcome to UEAB, where knowledge meets character, and dreams become reality.</p><br>
    </aside>


    <div class="division" id="sup">
        <div class="indiv" id="insup">
        <br><br><h2><big>SUPPLEMENTARY EXAMINATIONS </big></h2><br><br>
            <p style="margin: 13px auto; font-size:18px;">A Supplementary Exam is an additional examination 
                    for a student who has not attained a passing grade in a 
                    course. This is a second chance to pass the course, and 
                    students must pass the supplementary exam.</p> <br>

            <a class="a" href="request.php"><label for="enroll" style="margin-bottom: 10px ;"><b><big><pre>Apply Now -></pre></big></b></label></a>
        </div>

    </div>

  

    <div class="division" id="grad" >
        <div class="indiv" id="ingrad">
        <br><h2><big> UEAB GRADUATION </big></h2><br><br>
            <p style="margin: 10px auto; padding:5px;">UEAB accepts request for graduation made on an official Graduation Application 
                and Agreement cites one calendar year before the expected date of graduation.</p> <br>

            <a class="a" href="request.php"><label for="enroll" style="margin-bottom: 10px ;"><b><big><pre>Apply For Graduation -></pre></big></b></label></a>

        </div>
    </div>

    </form>
    <div class="section"></div>
   
</body>
<footer class="footer" >
    <div id="footer">
        <h3>University of Eastern <br>Africa, Baraton</h3><br>
        <hr>
        <img src="images/logo.png" alt="Logo" height="80px"><br><br>
        <small>P.O.BOX 2500, 30100 <br></small>
        <small>Eldoret, Kenya</small> <br>
        <small>Tel: 254 714 333 111/</small> <br>
            <small>+254 717 333 111</small> <br>
        <a href="mailto:ochiengjeck@gmail.com"><small>ochiengjeck@gmail.com</small></a>

    </div>
    
</footer>
    <div id="crown">
        <small>  &copy; All rights reserved 2023.UEAB</small>
        <img src="images/instagram.ico" alt="instagram">
        <img src="images/whatsapp.ico" alt="whatsapp">
        <a href="#home"><img src="images/home.ico" alt=""></a>
    </div>

</html>