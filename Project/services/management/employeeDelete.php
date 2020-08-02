<?php

include "../../common/dbConnection.php";
include "../../common/session.php";

$sql = "DELETE FROM users WHERE user_id='".$_GET['id']."'";

if(mysqli_query($conn,$sql)){
	echo " <script type='text/javascript'>alert('Delete Success!!!');location.href='../employeeManagement.php'</script>";                             
}else{
	echo " <script type='text/javascript'>alert('error Delete!!!');location.href='../employeeManagement.php'</script>";  
}
mysqli_close($conn);

?>