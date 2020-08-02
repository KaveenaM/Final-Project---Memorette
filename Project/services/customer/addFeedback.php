<?php
   
   include "../../common/dbConnection.php";
   include "../../common/session.php";
   $user_id =$_SESSION['user_id'];
    //Add new item

    if(isset($_POST['submit'])){

        $description=$_POST['feedback_description'];
        $message=$_POST['feedback_message'];

        

        $sql1="INSERT INTO feedbacks(user_id,feedback_description,feedback_message,feedback_date)
        VALUES('".$user_id."','".$description."','".$message."',now())";

        if (mysqli_query($conn,$sql1)){
            
            header("Refresh:0; url=feedback.php");
            
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }    
    
?>