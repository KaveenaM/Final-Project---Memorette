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
        <li><a href=../reports/reports.php>| Reports</a></li>
        <li><a href=../customerManagement.php>| Customer Management</a></li>
        <li><a href=../employeeManagement.php>| Employee Management</a></li>
        <li><a href=../orderManage.php>| Order Management</a></li>
        <li><a href=itemManagement.php>| Item Management</a></li>
        </ul>

  </div>


<div id="myDiv">

    <div class="content">
    <h1> Messages </h1>
    <table border="1" align=center id="myTable">
               
               <tr>  
                  <th>Message ID</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Date</th>                          
               </tr>  

          <?php  

          //View all items relevent to logged user

        //   $sql1 = "SELECT items.item_id, item_types.type_name
        //             FROM items
        //             left JOIN item_types ON items.item_type = item_types.type_id
        //             WHERE item_count>0";
                  
          $sql2 = " SELECT * FROM messages" ;  

        //   $result1 = mysqli_query($conn, $sql1);  
          $result2 = mysqli_query($conn, $sql2);

          if(mysqli_num_rows($result2) > 0){

          while($row = mysqli_fetch_array($result2))  
          {  
            //   $row1 = mysqli_fetch_row($result1)
          ?>  
              <tr>  
                  <td><?php echo $row['message_id'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['message'];?></td>
                  <td><?php echo $row['message_date'];?></td>                 

              </tr> 
          <?php
          } } else{
              echo "<tr>";
              echo "<td colspan='9'>No Messages found.</td>";
              echo "</tr>";
            } 
            ?>

          </table>
    </div>
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
