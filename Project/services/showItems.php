<!DOCTYPE html>

<?php

    session_start();

    include "../common/dbConnection.php";
    include "../common/cssjs.php";
        echo $csslib;    

    
?>
<html>

<head>
    <link rel="stylesheet" href="common/loginCss.css">
    <title>View Item</title>

</head>


<body style="background-image: linear-gradient(to bottom right,#ffccff, #ffe6ff);">
    <div class="top-container">
        <img src="../images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px>  
    </div>

    <div class="header" id="myHeader">

        <ul>
        <li><a href=registration.php>Register</a></li>
        <li><a href=contact.php>Contact Us</a></li>
        <li><a href=aboutUs.php>About Us</a></li>
        <li><a href=home.php>Home</a></li>
        </ul>

    </div> <br>

    <div id="header" style="margin-left:30%;">
    
    <form method="post" enctype="multipart/form-data">  
        <table border="1"  >
                    
                    
            <?php 

                $sql = "SELECT * FROM items WHERE item_id='".$_GET['id']."'";
                $result = mysqli_query($conn, $sql);  
                while($row = mysqli_fetch_array($result))  
                {  
            ?>  
                                   
                <div class="row" >
                    <div class="col-sm-4">
                    <div class="panel panel-default"  id="id">
                        <div class="panel-heading" align="center"><b><?php echo $row["item_name"]; ?></b></div>
                        <div class="panel-body"><?php echo ' 
                                            <img src="data:image/jpeg;base64,'.base64_encode($row['item_photo'] ).'" height="150" width="150" class="img-thumnail" />'?></div>
                        <div class="price" >
                        <table style="color:#002080;font-size:15px;font-family:Comic Sans MS, cursive, sans-serif;margin:20px;">
                            
                            <tr>
                                <td><b>Type  </b></td>
                                <td>: <?php echo $row['item_type'];?></td> 
                            </tr>
                            <tr>
                                <td><b>Available Quantity  </b></td>
                                <td>: <?php echo $row['item_count'];?></td> 
                            </tr>
                            <tr>
                                <td><b>Price  </b></td>
                                <td>: Rs.<?php echo $row['item_price'];?>/=</td> 
                            </tr>
                        </table>
                        </div>
                        <div class="col-sm-4" style="margin-left:30%;">
                        <br> <br><br>
                    
                        
                        <b>Condition : </b>New<br> <br>

                        <b>Description : </b><?php echo $row['item_description'];?><br> <br>

                        <b>Delivery : </b>Estimated between 5 days.<br> <br><br>

                        <b>Payments : 
                        
                        <select class="mdb-select md-form">
                            <option value="Cash On Delivery">Banking Payment</option>
                        </select>
                        
                        <div class="panel-footer" align=center ><button onclick="location.href='../home.php'" type="button" class="btn btn-dark" style="background-color:#00134d;color:white;margin:10px;width:100px;">Back</button><button onclick="location.href='../login.php ?id=<?php echo $row['item_id'];?>'" type="button" class="btn btn-dark" style="background-color:#00134d;color:white;margin:10px;width:100px;">Buy Now</button><br><br>
                    </div>
                    </div>
                </div>
            <?php
                } 
            ?>
    </form> 
    
    </div>
</body>

</html>
