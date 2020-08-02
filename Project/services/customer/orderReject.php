<?php

include "../../common/dbConnection.php";
include "../../common/session.php";

	$sql = "DELETE FROM temp_orders WHERE order_id='".$_GET['id']."';";

	if(mysqli_query($conn,$sql)){
        echo " <script type='text/javascript'>alert('Reject Success!!!');location.href='myOrders.php'</script>";                             
    }else{
        echo " <script type='text/javascript'>alert('error Reject!!!');location.href='myOrders.php'</script>";  
    }
    mysqli_close($conn);
?>