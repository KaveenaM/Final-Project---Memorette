<!DOCTYPE html>
<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <Title>Employee Page</title>

  <?php

      include "../../common/dbConnection.php";
      include "../../common/cssjs.php";
        echo $csslib;

      

  ?>

    <!-- Chart script-->
    <script src="../../common/code/highcharts.js"></script>
    <script src="../../common/code/modules/exporting.js"></script>
    <script src="../../common/code/modules/export-data.js"></script>

</head>

<body>

  <div class="top-container">
    <img src="../../images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px> 
  </div>

  <div class="header" id="myHeader">

    <ul>
      <li><a href=../logout.php>| Logout</a></li>
      <li><a href=../profileEdit.php>| profile</a></li>
      <li><a href=itemManagement.php>| Item Management</a></li>
    </ul>
      

  </div>

  <div class="content" >

  <h1> PROCESSING REQUESTS </h1>
    <table border="1" align=center id="myTable">
               
               <tr>  
                  <th>Request ID</th>
                  <th>User ID</th>
                  <th>Requested Date</th>
                  <th>Card Type</th>
                  <th>Count</th>                

               </tr>  

          <?php  

          //View all items relevent to logged user

          $sql1 = "SELECT customer_requests.request_id, item_types.type_name
                    FROM customer_requests
                    left JOIN item_types ON customer_requests.card_type = item_types.type_id
                    WHERE request_status=2";
                  
          $sql2 = " SELECT * FROM customer_requests where request_status=2";  

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
