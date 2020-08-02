<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<Title>Manager Page</title>

<?php

    include "../../common/dbConnection.php";
    include "../../common/session.php";
    include "../../common/cssjs.php";
      echo $csslib;
    
?>


</head>
<body>

  <div class="top-container">
    <img src="../../images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px> s     
  </div>

  <div class="header" id="myHeader">

    <ul>
      <li><a href=../logout.php>| Logout</a></li>
      <li><a href=../profileEdit.php>| profile</a></li>
      <li><a href=message.php>| Messages</a></li>
      <li><a href=../reports/reports.php>| Reports</a></li>
      <li><a href=../customerManagement.php>| Customer Management</a></li>
      <li><a href=../employeeManagement.php>| Employee Management</a></li>
      <li><a href=../orderManage.php>| Order Management</a></li>
      <li><a href=itemManagement.php>| Item Management</a></li>
    </ul>
  </div>

  <div class="content">
    <h1><center>Customer Requested Orders</center></h1>
    
    <table border="1" align=center id="myTable">
               
               <tr>  
                  <th>User ID</th>
                  <th>Item ID</th>
                  <th>Count</th> 
                  <th>Price</th>  
               </tr>  

          <?php  

          //View all orders 

          $sql2 = " SELECT * FROM temp_orders" ;  

          $result2 = mysqli_query($conn, $sql2);

          if(mysqli_num_rows($result2) > 0){

          while($row = mysqli_fetch_array($result2))  
          {  

          ?>  
              <tr>  
                  <td><?php echo $row['user_id'];?></td>
                  <td><?php echo $row['item_id'];?></td>
                  <td><?php echo $row['order_count'];?></td>
                  <td><?php echo $row['total_price']."/=";?></td>
              </tr> 
          <?php
          } } else{
              echo "<tr>";
              echo "<td colspan='9'>No record found.</td>";
              echo "</tr>";
            } 
            ?>

          </table>
    
    </div>

    <footer id="footer">
        <iframe 
        src="../../common/footer.php">
        </iframe>
    </footer>

</body>
</html>

<script>

//Page Scrol 
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

</script>
