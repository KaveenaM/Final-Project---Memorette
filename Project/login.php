<!DOCTYPE html>

<?php

    session_start();

    include "common/dbConnection.php";
    include "common/cssjs.php";
        echo $csslib;    

    if (isset($_POST['email'])){

        $email=$_POST['email'];
        $Password=md5($_POST['psw']);
        
        $query="SELECT * from users where user_email='$email' and user_password='$Password'";
        
        $result=mysqli_query($conn,$query);
        $count=mysqli_num_rows($result);
        
        if($count>0){
            $row=mysqli_fetch_row($result);
            $_SESSION['user_id']=$row[0];
            $_SESSION['user_email']=$row[3];
            $_SESSION['user_type']=$row[6];
            header('location: services/index.php');
        }else
            echo '<script>swal("Error!", "User Name Or Password Invalid!", "error");</script>';
                
    }	
?>
<html>

<head>
    <link rel="stylesheet" href="common/loginCss.css">
    <title>Login Here</title>

</head>


<body>
    <div class="top-container">
        <img src="images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px>  
    </div>

    <div class="header" id="myHeader">

        <ul>
            <li><a href=registration.php>| Register</a></li>
            <li><a href=contact.php>| Contact Us</a></li>
            <li><a href=aboutUs.php>| About Us</a></li>
            <li><a href=home.php>| Home</a></li>
        </ul>

    </div> 
    </br>

    <div id="header">
        <h1>Login Here</h1>

        <form method='POST' border=5px>
            <div class="container">

                <div id="section">
                    <label><b>Email</b></label>
                    <input type="email" class="tbox" placeholder="Enter email" name="email" required>
                </div>

                <div id="section">
                    <label><b>Password</b></label>
                    <input type="password" class="tbox" placeholder="Enter Password" name="psw" required>
                </div> 

                <div id="section">  
                    <label></label>
                    <button type="submit" class="button">Login</button>
                    <button type="reset" class="button" style="background-color: #f44336;">Cancel</button>
                </div>
            </div>
            <b> OR</b>
            </br>
            
            <button onclick="location.href='registration.php'" class="button" style="background-color:rgb(0, 0, 51);width:20%;">Register</button>
            <button onclick="location.href='home.php'" class="button" style="background-color:rgb(0, 0, 50);width:20%;">Home</button> 

        </form>
    
    </div>
</body>

</html>
