<?php
   
   include "../../common/dbConnection.php";
   include "../../common/session.php";
   


    if(isset($_POST['fname'])){

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $address=$_POST['address'];
        $password=md5($_POST['psw']);
        $role=3;

        
        $sql="INSERT INTO users(user_fname,user_lname,user_email,user_mobile,user_address,user_rdate,user_password,user_type)
                    VALUES('".$fname."','".$lname."','".$email."','".$mobile."','".$address."',now(),'".$password."','".$role."')";

        if (mysqli_query($conn,$sql)){
            echo " <script type='text/javascript'>alert('Employee Add Success!!!');location.href='../employeeManagement.php'</script>";
            
        }else{
            echo " <script type='text/javascript'>alert('You have an Error Register!!!');location.href='../employeeManagement.php'</script>";
        }
        mysqli_close($conn);
    }    
    
?>