<?php


        include "../common/dbConnection.php";
        include "../common/session.php";

		if($_SESSION['user_type']==1){
			header('location:admin/adminIndex.php');
		}else if($_SESSION['user_type']==2){
			header("location:management/managementIndex.php");
		}else if($_SESSION['user_type']==3){
			header('location: employee/employeeIndex.php');
		}else if($_SESSION['user_type']==4){
			header('location: customer/customerIndex.php');
		}

?>
   
              
			