<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<Title>Greating Cards</title>

<?php

    include "common/dbConnection.php";
    include "common/cssjs.php";
      echo $csslib;
    
?>


</head>
<body>

  <div class="top-container">
    <img src="images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px>  
  </div>

  <div class="header" id="myHeader">

    <ul>
      <li><a href=login.php>Login</a></li>
      <li><a href=registration.php>Register</a></li>
      <li><a href=contact.php>Contact Us</a></li>
      <li><a href=aboutUs.php>About Us</a></li>
      <li><a href=home.php>Home</a></li>
    </ul>

  </div> <br>

<?php
  $sql = "SELECT * FROM items WHERE item_type=3"; 
  $sql2 = "SELECT items.item_id, item_types.type_name
            FROM items
            left JOIN item_types ON items.item_type = item_types.type_id
            WHERE item_count>0";

  $result = mysqli_query($conn, $sql); 
  $result2 = mysqli_query($conn, $sql2);

  if(mysqli_num_rows($result)>0){
  while ($row = mysqli_fetch_array($result)){
      $row2 = mysqli_fetch_row($result2)
?> 

<div class="container" style="font-family: Arial, Helvetica, sans-serif;font-size:20px;background-color:#d6d6c2;">  
  <div class="row" >
    <div class="col-sm-4">
      <div class="panel panel-default"  id="id" style="background-color:#ffe6ff;">
        <div class="panel-heading" align="center" style="color:#330033;"><b><?php echo $row["item_name"]; ?></b></div>
        <div class="panel-body"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['item_photo'] ).'" height="220px" width="200px" class="img-thumnail" />'?></div>
        <div class="price">
        <table style="color:#002080;font-family:Comic Sans MS, cursive, sans-serif;">
        <tr>
            <td><b>Available Quantity  </b></td>
            <td>: <?php echo $row['item_count']; ?></td> 
        </tr>

      

        <tr>
            <td><b>Price  </b></td>
            <td>: <?php echo "Rs.".$row['item_price']."/="; ?></td> 
        </tr>

        </table>
        </div>
        <div class="panel-footer" align=center>
        <button onclick="location.href='services/showItems.php ?id=<?php echo $row['item_id'];?>'" type="button" class="btn btn-dark" style="background-color:#00134d;color:white;margin:10px;width:100px;">Show</button>
        <button onclick="location.href='login.php ?id=<?php echo $row['item_id'];?>'" type="button" class="btn btn-dark" style="background-color:#00134d;color:white;margin:10px;width:100px;">Buy</button>
        <br><br>
        </div>
      </div>
    </div>

<?php
      }
    }
?>
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
