
<?php

include "../../common/dbConnection.php";
include "../../common/session.php";
include "../../common/cssjs.php";
  echo $csslib;

$user_id =$_SESSION['user_id'];

//View details of relevent item


$sqlitem="SELECT * FROM users WHERE user_id = ".$user_id;

$itemresult=mysqli_query($conn,$sqlitem);


$itemdata=mysqli_fetch_row($itemresult);




?>

<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href="../../common/loginCss.css">
<title>Update Profile </title>

<style>
    body {
        background-color: #ffe6ff;
        background-attachment:fixed;
        background-position:center;
        background-size:cover;
    }
 
    #header{
            background-image: linear-gradient(to bottom right,#b300b3, #ffb3ff);
            border-radius: 10px;
            margin: auto;
            margin-top:50px;
            color:white;
            text-align:center;
            padding:5px;
            width:50%;
            border:1px solid black;      
    }

    #section{
        width:85%;
        float:left;
        padding:10px;	 	 
        height:100%;   
    }

    input[type=email],input[type=password],input[type=text]{
        width: 120%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .button{
        background-color: rgb(0, 0, 100);
        color: white;
        border-radius: 5px;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover{
        opacity: 0.6;
    }

    .container{
        width: 100%;
    }

    span.psw{
        float: right;
        padding-top: 16px;
        color:black;
    }

    .tbox{
        color:black
    }

    h3{
        color: red;
    }

    label{
        width:40%;
    }
    
    table{
        font-family:"Comic Sans MS", cursive, sans-serif;
        color:#4d004d;
        font-size:18px;
    }

    .td1{
        width:200px;
        color:black
    }

    td{
        width:200px;
    }

    .div{
        float:left;
        width:100px;
        margin-right:2px;
    }

    .required {
        color: yellow;
    }

    b{
        font-family:"Comic Sans MS", cursive, sans-serif;
        font-size:20px;
        color:#ff4da6;
    }
</style>

</head>

<body>

<div class="top-container">
<img src="../../images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px> s     
</div>

<div class="header" id="myHeader">

<ul>
  <li><a href=../logout.php>| Logout</a></li>
  <li><a href=../backToHome.php>| Home</a></li>
  
</ul>
</div>

<div class="content">
    <h1> My Approved Orders </h1>
    <table border="1" align=center id="myTable">
               
               <tr>  
                  <th>Order ID</th>
                  <th>Item ID</th>
                  <th>Design ID</th>
                  <th>Order Count</th>
                  <th>Order Price</th> 
                  <th>Order Date</th> 
               </tr>  

          <?php  

          //View all items relevent to logged user

          $sql1 = "SELECT orders.order_id, order_status.status_name
                    FROM orders
                    left JOIN order_status ON orders.order_status = order_status.status_id";
                  
          $sql2 = " SELECT * FROM orders WHERE ".$user_id;

          $result1 = mysqli_query($conn, $sql1);  
          $result2 = mysqli_query($conn, $sql2);

          if(mysqli_num_rows($result2) > 0){

          while($row = mysqli_fetch_array($result2))  
          {  
              $row1 = mysqli_fetch_row($result1)
          ?>  
              <tr>  
                  <td><?php echo $row['order_id'];?></td>
                  <td><?php echo $row['item_id'];?></td>
                  <td><?php echo $row['design_id'];?></td>
                  <td><?php echo $row['order_count'];?></td>
                  <td><?php echo $row['order_price']."/=";?></td>
                  <td><?php echo $row['order_date'];?></td>
                 
              </tr> 
          <?php
          } } else{
              echo "<tr>";
              echo "<td colspan='9'>No record found.</td>";
              echo "</tr>";
            } 
            ?>

    </table>
    <h1> My Pending Orders </h1>
    <table border="1" align=center id="myTable">
               
               <tr>  
                  <th>Order ID</th>
                  <th>Item ID</th>
                  <th>Design ID</th>
                  <th>Order Count</th>
                  <th>Order Price</th> 
                  <th>Order Date</th> 
                  <th>Actions</th>
               </tr>  

          <?php  

          //View all items relevent to logged user

                  
          $sql3 = " SELECT * FROM temp_orders WHERE ".$user_id;
 
          $result3 = mysqli_query($conn, $sql3);

          if(mysqli_num_rows($result3) > 0){

          while($row3 = mysqli_fetch_array($result3))  
          {  

          ?>  
              <tr>  
                  <td><?php echo $row3['payment_id'];?></td>
                  <td><?php echo $row3['item_id'];?></td>
                  <td><?php echo $row3['design_id'];?></td>
                  <td><?php echo $row3['order_count'];?></td>
                  <td><?php echo $row3['total_price']."/=";?></td>
                  <td><?php echo $row3['payment_date'];?></td>
    
                  <td>
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
        src="../../common/footer.php">
    </iframe>
</footer>

</body>
</html>