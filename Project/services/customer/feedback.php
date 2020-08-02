<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<Title>Customer Requests</title>

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
        
        <li>
            <div class="text-center">
                <a href="" data-toggle="modal" data-target="#eForm1">| Add Feedback</a>
            </div>
        </li>
        <li> <a href=../backToHome.php>| Home</a></li>
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
            <h3><strong>Add Feedback</strong></h3>
        </div>

        <form method="POST" action="addFeedback.php" enctype="multipart/form-data">
            <div class="modal-body mx-4" style="background-color:#330033;color:white;font-family:Arial, Helvetica, sans-serif;font-size:20px;">

                <div class="md-form mb-5">
                    <label>Feedback Description</label><span class="required">*</span>
                    <input type="text" name="feedback_description"  class="form-control validate" style="background-color:#bfbfbf;color:black;">
                </div>

                <div class="md-form mb-5">
                    <label>Feedback Message</label><span class="required">*</span>
                    <input type="text" name="feedback_message"  class="form-control validate" style="background-color:#bfbfbf;color:black;">
                </div>
                <br><br>
            
                <div class="text-center mb-3" style="background-color:330033;">
                    <div>
                        <input class="btn btn-primary" type="submit" name="submit" value="Submit" style="background-color:#1a001a;" >
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
        <h1> My Feedbacks </h1>
    <table border="1" align=center id="myTable">
               
               <tr>  
                  <th>Feedback ID</th>
                  <th>Feedback Description </th>
                  <th>Feedback Message</th>
                  <th>Feedback Date</th>                
               </tr>  

          <?php  

          //View all items relevent to logged user

                  
          $sql2 = " SELECT * FROM feedbacks where user_id='".$_SESSION['user_id']."';";
  
          $result2 = mysqli_query($conn, $sql2);

          if(mysqli_num_rows($result2) > 0){

          while($row = mysqli_fetch_array($result2))  
          {  
          ?>  
              <tr>  
                  <td><?php echo $row['feedback_id'];?></td>
                  <td><?php echo $row['feedback_description'];?></td>
                  <td><?php echo $row['feedback_message'];?></td>
                  <td><?php echo $row['feedback_date'];?></td>
 
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
