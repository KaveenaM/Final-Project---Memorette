<?php

    include "../../common/dbConnection.php";
    include "../../common/session.php";

    //Delete item 

    $sql = "DELETE  FROM item_designs WHERE design_id ='".$_GET['id']."';";

    if(mysqli_query($conn,$sql)){
        echo " <script type='text/javascript'>alert('Delete Success!!!');location.href='itemManagement.php '</script>";                             
    }else{
        echo " <script type='text/javascript'>alert('error Delete!!!');location.href='itemManagement.php'</script>";  
    }
    mysqli_close($conn);

?>