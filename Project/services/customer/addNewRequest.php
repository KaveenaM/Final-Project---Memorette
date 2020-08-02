<?php
   
   include "../../common/dbConnection.php";
   include "../../common/session.php";
   
    //Add new item

    if(isset($_POST['uid'])){

        $uid=$_POST['uid'];
        $type=$_POST['type'];
        $ccolor=$_POST['ccolor'];
        $texture=$_POST['texture'];
        $fcolor=$_POST['fcolor'];
        $count=$_POST['count'];
        
        $img = addslashes(file_get_contents($_FILES['image']["tmp_name"]));  
        $sql1="INSERT INTO customer_requests(user_id,request_date,card_type,card_color,card_texture,card_photo,Card_fontcolor,card_count,request_status)
        VALUES('".$uid."',now(),'".$type."','".$ccolor."','".$texture."','".$img."','".$fcolor."','".$count."',1)";

        if (mysqli_query($conn,$sql1)){
            
            header("Refresh:0; url=requests.php");
            
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }    
    
?>