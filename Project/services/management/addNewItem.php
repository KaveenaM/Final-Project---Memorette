<?php
   
   include "../../common/dbConnection.php";
   include "../../common/session.php";
   
    //Add new item

    if(isset($_POST['name'])){

        $name=$_POST['name'];
        $type=$_POST['type'];
        $desc=$_POST['desc'];
        $price=$_POST['price'];
        $count=$_POST['count'];
        
        $img = addslashes(file_get_contents($_FILES['image']["tmp_name"]));  
        $sql1="INSERT INTO items(item_name,item_type,item_description,item_photo,item_price,item_count,item_adddate)
        VALUES('".$name."','".$type."','".$desc."','".$img."','".$price."','".$count."',now())";

        if (mysqli_query($conn,$sql1)){
            
            header("Refresh:0; url=itemManagement.php");
            
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }    
    
?>