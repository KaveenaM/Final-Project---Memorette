<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<Title>Manager Page</title>

<?php

    include "../common/dbConnection.php";
    include "../common/session.php";
    include "../common/cssjs.php";
      echo $csslib;
    
?>


</head>
<body>

  <div class="top-container">
    <img src="../images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px> s     
  </div>

  <div class="header" id="myHeader">

    <ul>
        <li><a href=logout.php>| Logout</a></li>
        <li><a href=cancelOrders.php>| Cancel Orders</a></li>
        <li><a href=newOrders.php>| Paid Orders</a></li>
        <li><a href=backToHome.php>| Home</a></li>
        
    </ul>

  </div>
 



    <div class="content">
    <h1><center> Orders</center></h1>
    
    <table border="1" align=center id="myTable">
               
               <tr>  
                  <th>Payment ID</th>
                  <th>Item ID</th>
                  <th>Design ID</th>
                  <th>User ID</th>
                  <th>Count</th> 
                  <th>Price</th>  
                  <th>Slip Photo</th>                        
                  <th>Ordered Date</th>
                  <th> Action </th>
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
                  <td><?php echo $row['payment_id'];?></td>
                  <td><?php echo $row['item_id'];?></td>
                  <td><?php echo $row['design_id'];?></td>
                  <td><?php echo $row['user_id'];?></td>
                  <td><?php echo $row['order_count'];?></td>                   
                  <td><?php echo $row['total_price']."/=";?></td>
                  <td><?php echo ' 
                      <img src="data:image/jpeg;base64,'.base64_encode($row['paymentslip_photo'] ).'" height="150" width="150" class="img-thumnail" />'?> 
                  </td> 
                  <td><?php echo $row['payment_date'];?></td>
                  <td>
                    <a onClick="javascript: return confirm('Are you sure want to Confirm?');" href="orderConfirm.php ?id=<?php echo $row['payment_id'];?>" class="btn btn-dark" type="button" style="background-color:green;color:white;margin:10px"> Confirm </a>
                    <a onClick="javascript: return confirm('Are you sure want to Reject?');" href="orderReject.php ?id=<?php echo $row['payment_id'];?>" class="btn btn-dark" type="button" style="background-color:red;color:white;"> Reject </a> 
                  </td>

                 
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
        src="../common/footer.php">
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

//Image Input
$(document).ready(function(){  
      $('#submit').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  

</script>
