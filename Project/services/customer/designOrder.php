<?php session_start();

    

    include "../../common/dbConnection.php";
    include "../../common/cssjs.php";
        echo $csslib;    


    //View item details of logged user

    $sql1="SELECT * FROM item_designs WHERE design_id='".$_GET['id']."'";
    $result1=mysqli_query($conn,$sql1);
    $data=mysqli_fetch_assoc($result1);  
    
    $sql9 = "SELECT items.item_id FROM items LEFT OUTER JOIN item_designs 
    ON items.item_id=item_designs.item_id WHERE design_id='".$_GET['id']."'";
    $result9=mysqli_query($conn,$sql9);
    $data9=mysqli_fetch_assoc($result9);  
    
    //View details of logged user

    $sql4="SELECT * FROM users WHERE user_id=".$_SESSION['user_id'];
    $result4=mysqli_query($conn,$sql4);
    $data4=mysqli_fetch_assoc($result4);

    //Insert record of ordered item to order table & Update the count of item in items table

    if(isset($_POST['quantity'])){

        $Total = $_POST['quantity'] * $data['item_price'];
        $count = $_POST['quantity'];

        // $img = addslashes(file_get_contents($_FILES['slip']["tmp_name"])); 
        
        $img = addslashes(file_get_contents($_FILES['slip']["tmp_name"])); 
        
        $sql2="INSERT INTO temp_orders(item_id,user_id,order_count,total_price,paymentslip_photo,payment_date,design_id) 
        VALUES('".$data9['item_id']."','".$data4['user_id']."','".$_POST['quantity']."','".$Total."','".$img."',now(),'".$_GET['id']."')"; 

        $sql5="UPDATE items SET item_count = item_count - $count WHERE item_id = '".$data9['item_id']."'"; 
        $sql6 ="UPDATE item_designs SET item_count = item_count - $count WHERE item_id = '".$data9['item_id']."'"; 
            
        if(mysqli_query($conn,$sql2) && mysqli_query($conn,$sql5) && mysqli_query($conn,$sql6)){
            header('location: customerIndex.php');

        }else{
          echo "Error".$sql2."<br>".mysqli_error($conn); 
        }     
    }
    
?>

<!DOCTYPE html>
<html>

<head>

</head>
<body style="color:#002080;font-family:Arial, Helvetica, sans-serif;font-size:50px;">

    <form method="POST" action="" enctype="multipart/form-data"> 
    <h1 align=center>Review Item And Deliver :</h1>
        <table align="center"  id="myTable" style="width:50%;" >
            <tr>
                <td>
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($data['design_photo'] ).'" height="150" width="150" class="img-thumnail" />'?> 
                </td>
            </tr>
            <tr>
                <td><b>Name : <input type="text" value="<?php echo $data['item_name']; ?>" readonly></b></td>
            </tr>
            <tr>
                <td><b>Quantity : <input type="text" name="quantity" required></b></td>
            </tr>
            <tr>
                <td><b>Price of One: <input type="text" value="<?php echo $data['item_price']."/="; ?>" readonly></b></td>
            </tr>
            <tr>
                <td><b>Enter Image of Payment Slip: <input type="file" name="slip" id="slip" required></b></td>
            </tr>
            <tr>
                <td><b>Shiping in 5 days..</b></td>
            </tr>

            <tr>
                <td><button onclick="location.href='customer/customerindex.php'" type="button" class="btn btn-dark" style="background-color:#ff4d4d;color:white;width:100px;height:40px">Cancel</button>
                <button type="submit" id="submit" class="btn btn-dark" style="background-color: #0052cc;color:white;width:100px;height:40px"  >Confirm</button><br></td>
            </tr>
        </table>
    </form> 

   

    
</body>
</html> 
