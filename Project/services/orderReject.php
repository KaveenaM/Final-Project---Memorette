<?php
   
   include "../common/dbConnection.php";
   include "../common/session.php";


    $sql2 = "SELECT * from temp_orders where payment_id = '".$_GET['id']."';";
    $result2 = mysqli_query($conn, $sql2);

    if(mysqli_num_rows($result2)>0){
        while( $row2=mysqli_fetch_row($result2)){
            $item_id =  $row2[1]; 
            $user_id =  $row2[2];
            $order_count =  $row2[3]; 
            $order_price =  $row2[4]; 
            $order_date =  $row2[6]; 
        }
    }

    $status = 3;
   
    //Add new item

    if(isset($_GET['id'])){



        $sql1 ="INSERT INTO orders(item_id,user_id,order_count,order_price,order_date,order_status)
               VALUES('".$item_id."','". $user_id."','".$order_count."','".$order_price."','".$order_date."','".$status."')";

        $sql3 = "DELETE FROM temp_orders WHERE payment_id='".$_GET['id']."';";

        if (mysqli_query($conn,$sql1) && mysqli_query($conn,$sql3)){
            
            echo " <script type='text/javascript'>alert('Order Rejected!!!');location.href='orderManage.php'</script>";    
            
        }else{
            echo " <script type='text/javascript'>alert('Error Rejected!!!');location.href='orderManage.php'</script>";
        }
        mysqli_close($conn);
    }    
    
?>