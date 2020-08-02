
<?php

  include "../../common/dbConnection.php";
  include "../../common/session.php";
  include "../../common/cssjs.php";
    echo $csslib;


  //Get Month Name
  $month = date('m');

  if($month == 01){
    $mon = "January";
  } elseif ($month == 02 ) {
    $mon = "February";
  }elseif ($month == 03 ) {
    $mon = "March";
  }elseif ($month == 04 ) {
    $mon = "April";
  }elseif ($month == 05 ) {
    $mon = "May";
  }elseif ($month == 06 ) {
    $mon = "June";
  }elseif ($month == 07 ) {
    $mon = "July";
  }elseif ($month == 10 ) {
    $mon = "Octomber";
  }elseif ($month == 11 ) {
    $mon = "November";
  }elseif ($month == 12 ) {
    $mon = "December";
  }elseif ($month == (02*4) ) {
    $mon = "August";
  }else{
    $mon = "September";
  }

?>
<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <Title>Reports</title>

</head>
<body>

  <div class="top-container">
    <img src="../../images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px> s     
  </div>

  <div class="header" id="myHeader">

    <ul>
      <li><a href=../logout.php>| Logout</a></li>
      <li><a href=yearly.php>| Yearly Report</a></li>
      <li><a href=reports.php>| Daily Report</a></li>
      <li><a href=../backToHome.php>| Home</a></li>
    </ul>

  </div>

  <div class="content">
    <input type="button" id="btnExport" value="Download as PDF" onclick="Export()" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
      function Export() {
          html2canvas(document.getElementById('myDiv'), {
              onrendered: function (canvas) {
                  var data = canvas.toDataURL();
                  var docDefinition = {
                      content: [{
                          image: data,
                          width: 500
                      }]
                  };
                  pdfMake.createPdf(docDefinition).download("<?php echo date("Y"); ?>  <?php echo  $mon; ?>" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".pdf");
              }
          });
      }
    </script>

    <div id="myDiv">

      <div class="content">

        <form method='POST' >
          <h1 align='center'> Monthly Order Report </br> <?php echo date("Y"); ?>  <?php echo  $mon; ?> </h1>
            <table border="1" align=center id="myTable">
              <tr>  
                  <th>User ID</th>
                  <th>Item ID</th>
                  <th>Design ID</th>
                  <th>Order Count</th>
                  <th>Price</th>  
              </tr>  

              <?php  

                //View all orders 

                $sql2 = " SELECT * FROM orders WHERE order_status = 2 AND MONTH(order_date) = MONTH(CURDATE());" ;  

                $result2 = mysqli_query($conn, $sql2);

                if(mysqli_num_rows($result2) > 0){

                while($row = mysqli_fetch_array($result2)){  

              ?>  
              <tr>  
                <td><?php echo $row['user_id'];?></td>
                <td><?php echo $row['item_id'];?></td>
                <td><?php echo $row['design_id'];?></td>
                <td><?php echo $row['order_count'];?></td>
                <td><?php echo $row['order_price']."/=";?></td>                   
              </tr> 
              <?php
                  } 
                } else{
                  echo "<tr>";
                  echo "<td colspan='9'>No record found.</td>";
                  echo "</tr>";
                } 
              ?>
            </table>
          </form>
        </div>
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
