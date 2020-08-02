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
        <li><a href=customerRequests.php>| Customer Requests</a></li>
        <li>
            <div class="text-center">
                <a href="" data-toggle="modal" data-target="#eForm1">| Add Item</a>
            </div>
        </li>
        <li><a href=../backToHome.php>| Home</a></li>
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
            <h3><strong>Add New Item</strong></h3>
        </div>

        <form method="POST" action="addNewItem.php" enctype="multipart/form-data">
            <div class="modal-body mx-4" style="background-color:#330033;color:white;font-family:Arial, Helvetica, sans-serif;font-size:20px;">
                
                <div class="md-form mb-5">
                    <label>Item Name</label><span class="required">*</span>
                    <input type="text" name="name" class="form-control validate" placeholder="Enter Item Name Here" required style="background-color:#bfbfbf;color:black;">
                </div>

                <div class="md-form mb-5">
                    <label>Item Type</label><span class="required">*</span>
                    <select name="type" class="form-control validate" style="background-color:#bfbfbf;color:black;">
                        <option value="1">Birth Day</option>
                        <option value="2">Annyverssary</option>
                        <option value="3">New Year</option>
                        <option value="4">Christmas</option>
                        <option value="5">Easter</option>
                    </select>
                </div>

                <div class="md-form mb-5">
                    <label>Item Description</label>
                    <input type="textarea" name="desc" class="form-control validate" placeholder="Pleace Enter Small Description Of Your Item" style="background-color:#bfbfbf;color:black;height:80px">
                </div>

                <div class="md-form mb-5">
                    <label>Item Photo</label><span class="required">*</span>
                        <input type="file" name="image" id="image" class="form-control validate" placeholder="Pleace Enter Image Of Your Item" style="background-color:#bfbfbf;color:black;height:80px"> 
                </div>

                <div class="md-form mb-5">
                    <label>Price</label><span class="required">*</span>
                    <input type="text" name="price" class="form-control validate" placeholder="Enter The Price of One Item" required style="background-color:#bfbfbf;color:black;">
                </div>

                <div class="md-form mb-5">
                    <label>Count</label><span class="required">*</span>
                    <input type="text" name="count" class="form-control validate" placeholder="Enter The Count of Items You Have To Sell" required style="background-color:#bfbfbf;color:black;">
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
    <table border="1" align=center id="myTable">
               
               <tr>  
                  <th>ID</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Description</th> 
                  <th>Photo</th>                          
                  <th>Price</th>
                  <th>Count</th> 
                  <th>Add Date</th>
                  <th>Designs</th>
                  <th>Actions</th>
               </tr>  

          <?php  

          //View all items relevent to logged user

          $sql1 = "SELECT items.item_id, item_types.type_name
                    FROM items
                    left JOIN item_types ON items.item_type = item_types.type_id
                    WHERE item_count>0";
                  
          $sql2 = " SELECT * FROM items where item_count>0" ;  

          $result1 = mysqli_query($conn, $sql1);  
          $result2 = mysqli_query($conn, $sql2);

          if(mysqli_num_rows($result2) > 0){

          while($row = mysqli_fetch_array($result2))  
          {  
              $row1 = mysqli_fetch_row($result1)
          ?>  
              <tr>  
                  <td><?php echo $row['item_id'];?></td>
                  <td><?php echo $row['item_name'];?></td>
                  <td><?php echo $row1[1];?></td>
                  <td><?php echo $row['item_description'];?></td>
                  <td><?php echo ' 
                      <img src="data:image/jpeg;base64,'.base64_encode($row['item_photo'] ).'" height="150" width="150" class="img-thumnail" />'?> 
                  </td> 
                  <td><?php echo $row['item_price']."/=";?></td>                   
                  <td><?php echo $row['item_count'];?></td>
                  <td><?php echo $row['item_adddate'];?></td>
                  <td><button onclick="location.href='design.php ?id=<?php echo $row['item_id'];?>'" type="button" class="btn btn-dark" style="background-color:blue;color:white;margin:10px">Designs </button> </td>
                  <td>
                    <a onClick="javascript: return confirm('Are you sure want to Update?');" href="itemUpdate.php ?id=<?php echo $row['item_id'];?>" class="btn btn-dark" type="button" style="background-color:green;color:white;margin:10px"> Update </a>
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
