<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<Title>Customer Requests</title>

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
        <li><a href=cancelledRequests.php>| Cancelled</a></li>
        <li><a href=processingRequests.php>| Processing</a></li>
        <li><a href=customerRequests.php>| New</a></li>
        <?php
            if($_SESSION['user_type']==2){
        ?>
        <li>
            <div class="text-center">
                <a href="" data-toggle="modal" data-target="#eForm1">| Add Request</a>
                <li><a href=management/itemManagement.php>| Back</a></li>
            </div>
        </li>
        <?php
            }
        ?>
        
        <li><a href=backToHome.php>| Home</a></li>
    </ul>

  </div>

    <!-- ADD NEW ITEM MODEL FORM -->

    <div class="modal fade" id="eForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        
        <div class="modal-dialog" role="document">
        <div class="modal-content form-elegant">

        <div class="modal-header text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h3><strong>Add Request</strong></h3>
        </div>

        <form method="POST" action="addNewRequest.php" enctype="multipart/form-data">
            <div class="modal-body mx-4" style="background-color:#330033;color:white;font-family:Arial, Helvetica, sans-serif;font-size:20px;">
                
                <div class="md-form mb-5">
                    <label>User Id</label><span class="required">*</span>
                    <input type="text" name="uid" value="<?php echo $_SESSION['user_id']; ?>" class="form-control validate" style="background-color:#bfbfbf;color:black;" required readonly>
                </div>

                <div class="md-form mb-5">
                    <label>Card Type</label><span class="required">*</span>
                    <select name="type" class="form-control validate" style="background-color:#bfbfbf;color:black;" required>
                        <option value="1">Birth Day</option>
                        <option value="2">Annyverssary</option>
                        <option value="3">New Year</option>
                        <option value="4">Christmas</option>
                        <option value="5">Easter</option>
                    </select>
                </div>

                <div class="md-form mb-5">
                    <label>Card Color</label>
                    <select name="ccolor" class="form-control validate" style="background-color:#bfbfbf;color:black;">
                        <option value="1">Birth Day</option>
                        <option value="2">Annyverssary</option>
                        <option value="3">New Year</option>
                        <option value="4">Christmas</option>
                        <option value="5">Easter</option>
                    </select>
                </div>

                <div class="md-form mb-5">
                    <label>Card Texture</label>
                    <input type="text" name="texture" class="form-control validate" placeholder="Enter The Count of Items You Want" style="background-color:#bfbfbf;color:black;" required>
                </div>

                <div class="md-form mb-5">
                    <label>Item Photo</label>
                        <input type="file" name="image" id="image" class="form-control validate" valu="No Image" placeholder="Pleace Enter Image Of Your Item" style="background-color:#bfbfbf;color:white;height:80px"> 
                </div>

                <div class="md-form mb-5">
                    <label>Font Color</label>
                    <select name="fcolor" class="form-control validate" style="background-color:#bfbfbf;color:black;">
                        <option value="1">Birth Day</option>
                        <option value="2">Annyverssary</option>
                        <option value="3">New Year</option>
                        <option value="4">Christmas</option>
                        <option value="5">Easter</option>
                    </select>
                </div>

                <div class="md-form mb-5">
                    <label>Count</label><span class="required">*</span>
                    <input type="text" name="count" class="form-control validate" placeholder="Enter The Count of Items You Want" style="background-color:#bfbfbf;color:black;" required>
                </div><br><br>
            
                <div class="text-center mb-3" style="background-color:330033;">
                    <div>
                        <input class="btn btn-primary" type="submit" value="Submit" style="background-color:#1a001a;" >
                        <input class="btn btn-primary" type="reset" value="Reset" style="background-color:#1a001a;" >
                    </div>
                </div>
                <p>
                    <span class="required">*</span>Required fields
                </p>
                
            </div>
        </form>

        </div>
        </div>

    </div>

    <div class="content">
        <h1> FINISHED REQUESTS </h1>
    <table border="1" align=center id="myTable">
               
               <tr>  
                  <th>Request ID</th>
                  <th>User ID</th>
                  <th>Requested Date</th>
                  <th>Card Type</th>
                  <th>Count</th>                
                  <th>Actions</th>
               </tr>  

          <?php  

          //View all items relevent to logged user

          $sql1 = "SELECT customer_requests.request_id, item_types.type_name
                    FROM customer_requests
                    left JOIN item_types ON customer_requests.card_type = item_types.type_id
                    WHERE request_status=4";
                  
          $sql2 = " SELECT * FROM customer_requests where request_status=4";  

          $result1 = mysqli_query($conn, $sql1);  
          $result2 = mysqli_query($conn, $sql2);

          if(mysqli_num_rows($result2) > 0){

          while($row = mysqli_fetch_array($result2))  
          {  
              $row1 = mysqli_fetch_row($result1)
          ?>  
              <tr>  
                  <td><?php echo $row['request_id'];?></td>
                  <td><?php echo $row['user_id'];?></td>
                  <td><?php echo $row['request_date'];?></td>
                  <td><?php echo $row1[1];?></td>
                  <td><?php echo $row['card_count'];?></td>
    
                  <td><button onclick="location.href='viewRequest.php ?id=<?php echo $row['request_id'];?>'" type="button" class="btn btn-dark" style="background-color:green;color:white;margin:10px">View</button>
                  <button onclick="location.href='requestDelete.php ?id=<?php echo $row['request_id'];?>'" type="button" class="btn btn-dark" style="background-color:red;color:white;">Delete</button></td>
                 
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
