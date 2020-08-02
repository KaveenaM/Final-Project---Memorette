<!DOCTYPE html>

<?php


    include "common/dbConnection.php";
    include "common/cssjs.php";
        echo $csslib;

    if(isset($_POST['email'])){

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $mobile=$_POST['contact'];
        $address=$_POST['address'];
        $password=md5($_POST['psw1']);
        $role=4;
        
        $sql = "INSERT INTO users(user_fname,user_lname,user_email,user_mobile,user_address,user_rdate,user_password,user_type)
                VALUES('".$fname."','".$lname."','".$email."','".$mobile."','".$address."',now(),'".$password."','".$role."')";
        
        if (mysqli_query($conn,$sql)){
            echo '<script> swal("Successfull!", "Accepted Your Registration!", "success");</script>';
        }else{
            echo '<script> swal("Unsuccessfull!", "Reject Your Registration!", "error");</script>';
        }
        mysqli_close($conn);
    }
?>
<html>

<head>

    <title>Register Here</title>

    <style>

        body {
            background-color: #ffe6ff;
            background-attachment:fixed;
            background-position:center;
            background-size:cover;
        }
    
        #header{
            background-image: linear-gradient(to bottom right,#b300b3, #ffb3ff);
            border-radius: 10px;
            margin: auto;
            margin-top:50px;
            color:white;
            text-align:center;
            padding:5px;
            width:50%;
            border:1px solid black;      
        }

        #section{
            width:85%;
            float:left;
            padding:10px;	 	 
            height:100%;   
        }

        input[type=email],input[type=password],input[type=text]{
            width: 120%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .button{
            background-color: rgb(0, 0, 100);
            color: white;
            border-radius: 5px;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover{
            opacity: 0.6;
        }

        .container{
            width: 100%;
        }

        span.psw{
            float: right;
            padding-top: 16px;
            color:black;
        }

        .tbox{
            color:black
        }

        h3{
            color: red;
        }

        label{
            width:40%;
        }
        
        table{
            font-family:"Comic Sans MS", cursive, sans-serif;
            color:#4d004d;
            font-size:18px;
        }

        .td1{
            width:200px;
            color:black
        }

        td{
            width:200px;
        }

        .div{
            float:left;
            width:100px;
            margin-right:2px;
        }

        .required {
            color: yellow;
        }

        b{
            font-family:"Comic Sans MS", cursive, sans-serif;
            font-size:20px;
            color:#ff4da6;
        }

    </style>

</head>

<body>
    <div class="top-container">
        <img src="images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px>  
    </div>

    <div class="header" id="myHeader">

        <ul>
            <li><a href=login.php>| Login</a></li>
            <li><a href=aboutUs.php>| About Us</a></li>
            <li><a href=contact.php>| Contact Us</a></li>
            <li><a href=home.php>| Home</a></li>
        </ul>
        
    </div> 
    </br>

    <div id="header">

        <h1>Register Here</h1>

        <form method='POST' border=5px action="">

            <div align=center>
                <table>

                    <tr>
                        <td class="td">First name<span class="required">*</span></td>
                        <td class="td1"><input type="text" placeholder="Enter first name" name="fname"  pattern="[A-Za-z].{4,}" title="Minimum 05 Characters" required></td>
                    </tr>

                    <tr>
                        <td class="td">Last name</td>
                        <td class="td1"><input type="text" placeholder="Enter last name" name="lname" pattern="[A-Za-z].{4,}" title="Minimum 05 Characters" required></td>
                    </tr>

                    <tr>
                        <td class="td">Email<span class="required">*</span></td>
                        <td class="td1"><input type="email" placeholder="Enter email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$" title="Ex:- test@gmail.com" required></td>
                    </tr>

                    <tr>
                        <td class="td">Phone Number<span class="required">*</span></td>
                        <td class="td1"><input type="text" placeholder="Enter phone number" name="contact" pattern="[0-9]{10}" title="Ex:- 0771234567" required></td>
                    </tr>

                    <tr>
                        <td class="td">Address<span class="required">*</span></td>
                        <td class="td1"><input type="text" placeholder="Enter address" name="address" pattern="[A-Za-z].{4,}" title="Minimum 05 Characters" required></td>
                    </tr>

                    <tr>
                        <td class="td">Password<span class="required">*</span></td>
                        <td class="td1"><input type="password" placeholder="Enter Password" name="psw1" pattern=".{5,}" title="Five or more characters" required></td>
                    </tr>

                    <tr>
                        <td class="td"> </td>
                        <td class="td"> 
                            <table>  
                                <tr> 
                                    <td>
                                        <div class="div">
                                            <input type="submit" value="Register" class="button">
                                        </div> 
                                    </td>               
                                    <td>
                                        <div class="div">
                                            <button type="reset" class="button" style="background-color: #f44336;">Cancel</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>        
                    </tr>
                </table>
            </div>

            <p style="float:left;">
                <span class="required" >*</span>Required fields
            </p>

            If You Already Have An Account </br>

            <button onclick="location.href='login.php'" class="button" style="background-color:rgb(0, 128, 255);width:20%;">Login Here</button>
            <button onclick="location.href='home.php'" class="button" style=" border-radius: 5px;background-color:rgb(0, 0, 50);width:20%;height=10%;">Home</button>
    
	    </form>

    
    </div>
</body>

</html>
