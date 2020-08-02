<?php

    include "../../common/dbConnection.php";
    include "../../common/session.php";

    //Reject item 
    $sql1 = "UPDATE customer_requests SET request_status=3, card_photo = '' WHERE request_id='".$_GET['id']."';";
    

    if(mysqli_query($conn,$sql1)){
        echo " <script type='text/javascript'>alert('Rejected!!!');location.href='processignRequests.php'</script>";                    
    }else{
        echo " <script type='text/javascript'>alert('error Rejected!!!');location.href='processignRequests.php'</script>";
    }

?>