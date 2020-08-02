
<?php

include "../../common/dbConnection.php";
include "../../common/session.php";
include "../../common/cssjs.php";
  echo $csslib;

//View details of relevent item

$sqlitem="SELECT * FROM items WHERE item_id='".$_GET['id']."'";
$sqlitem1 ="SELECT items.item_id, item_types.type_name
        FROM items
        left JOIN item_types ON items.item_type = item_types.type_id
        WHERE items.item_id='".$_GET['id']."'";

$itemresult=mysqli_query($conn,$sqlitem);
$itemresult1=mysqli_query($conn,$sqlitem1);

$itemdata=mysqli_fetch_row($itemresult);
$itemdata1=mysqli_fetch_row($itemresult1);

//Update relevent id in items table

if(isset($_POST['iname'])){
$sql="UPDATE items
            SET 
                item_name='".$_POST['iname']."',
                item_description='".$_POST['idesc']."',
                item_price='".$_POST['price']."',
                item_count='".$_POST['icount']."'
            WHERE item_id='".$_GET['id']."'";

$sql2 = "UPDATE item_designs
    SET 
        item_name='".$_POST['iname']."',
        item_description='".$_POST['idesc']."',
        item_price='".$_POST['price']."',
        item_count='".$_POST['icount']."'
    WHERE item_id='".$_GET['id']."'";

    if(mysqli_query($conn,$sql) && mysqli_query($conn,$sql2)){
        echo " <script type='text/javascript'>alert('Update Success!!!');location.href='itemManagement.php'</script>";                    
    }else{
        echo " <script type='text/javascript'>alert('error Update!!!');location.href='itemManagement.php'</script>";
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href="common/loginCss.css">
<title>Update Items </title>

</head>

<body>

<div class="top-container">
<img src="../../images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px> s     
</div>

<div class="header" id="myHeader">

<ul>
  <li><a href=../logout.php>| Logout</a></li>
  <li><a href=../profileEdit.php>| profile</a></li>
  <li><a href=itemManagement.php>| Item Management</a></li>
  <li><a href=backToHome.php>| Home</a></li>
</ul>
</div>

<div class="content">
    <form method='POST' >
    <h1 align=center style="color:url(0,0,40);font-family:"> Update Item </h1>
    <table  border="1"align=center id="myTable"  style="width:60%;" cellpadding="10" >
        <tr>
            <td>Id: </td>
            <td> <input type="text" name="itemid" value="<?php echo $itemdata[0]; ?>" required readonly></td>
        </tr>

        <tr>
            <td>Name: </td>
            <td> <input type="text" name="iname" value="<?php echo $itemdata[1]; ?>" required ></td>
        </tr>

        <tr>
            <td>Type: </td>
            <td> 
                <select name="type" >
                    <option value="<?php echo $itemdata[2]; ?>"><?php echo $itemdata1[1]; ?></option>
                    <option value="1">Birth Day</option>
                    <option value="2">Annyverssary</option>
                    <option value="3">New Year</option>
                    <option value="4">Christmas</option>
                    <option value="5">Easter</option>
                </select>
            </td>   
        </tr>
    
        <tr>
            <td>Description: </td>
            <td> <input type="text" name="idesc" value="<?php echo $itemdata[3]; ?>" required></td>
        </tr>

        <tr>
            <td>Photo: </td>
            <td><?php echo ' 
                  <img src="data:image/jpeg;base64,'.base64_encode($itemdata[4]).'" height="150" width="150" class="img-thumnail" />'?> 
                  * Photo Can't Update
            </td> 
        </tr>
        
        <tr>
            <td>Price(LKR): </td>
            <td> <input type="text" name="price" value="<?php echo $itemdata[5]; ?>" ></td>
        </tr>

        <tr>
            <td>Count: </td>
            <td> <input type="text" name="icount" value="<?php echo $itemdata[6]; ?>" ></td>
        </tr>

        <tr>
            <td>Add Date : </td>
            <td><input type="text" value="<?php echo $itemdata[7]; ?>" readonly></td>
        </tr>

        <tr>
            <td></td>                
            <td align="right" ><button type="submit" class="btn btn-dark" style="background-color:green;color:white;margin:10px">Update</button>
            <button type="reset" class="btn btn-dark" style="background-color:red;color:white;">Reset</button></td>  
        </tr>
    </table>
    </form>
</div>

<footer id="footer">
    <iframe 
        src="../../common/footer.php">
    </iframe>
</footer>

</body>
</html>