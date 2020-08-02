<!DOCTYPE html>

<?php

    session_start();

    include "common/dbConnection.php";
    include "common/cssjs.php";
        echo $csslib;    

    if (isset($_POST['email'])){

        $name=$_POST['fname'];
        $email=$_POST['email'];
        $msg=$_POST['msg'];
        
        $query="INSERT INTO messages(email,message,message_date,message_status)
        VALUES('".$email."','".$msg."',now(),1)";
        
        if (mysqli_query($conn,$query)){
            echo " <script type='text/javascript'>alert('Success!!!');location.href='home.php'</script>";    
        }else{
            echo " <script type='text/javascript'>alert('Error!!!');location.href='home.php'</script>";    
        }
        mysqli_close($conn);
                
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
            <li><a href=login.php>| Login</a></li>
            <li><a href=registration.php>| Register</a></li>
            <li><a href=aboutUs.php>| About Us</a></li>
            <li><a href=home.php>| Home</a></li>
        </ul>
        
    </div> 

    <div id="header">
        <h1>Send Message</h1>

        <form method='POST' border=5px>

            <div class="container">

                <div id="section">
                    <label><b>Full Name</b></label>
                    <input type="text" class="tbox" placeholder="Enter Your Name" name="fname" pattern="[A-Za-z].{4,}" title="Minimum 05 Characters" required style=" width: 30%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;box-sizing: border-box;">
                </div> 

                <div id="section">
                    <label><b>Email</b></label>
                    <input type="email" class="tbox" placeholder="Enter email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ex:- test@gmail.com" required>
                </div>

                <div id="section">
                    <label><b>Message</b></label>
                    <input type="text" class="tbox" placeholder="Enter Message" name="msg" required style=" width: 30%;height:100px;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;box-sizing: border-box;">
                </div> 
                
                <div id="section">  
                    <label></label>
                    <button type="submit" class="button">Submit</button>
                    <button type="reset" class="button" style="background-color: #f44336;">Cancel</button>
                </div>

            </div>
        </form>
    
    </div>
</body>

</html>
