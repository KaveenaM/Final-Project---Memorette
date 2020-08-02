
<?php

include "../../common/dbConnection.php";
include "../../common/session.php";
include "../../common/cssjs.php";
  echo $csslib;

//View details of relevent item

$sqlitem="SELECT * FROM customer_requests WHERE request_id='".$_GET['id']."'";
$sqlitem1 ="SELECT customer_requests.request_id, item_types.type_name
            FROM customer_requests
            left JOIN item_types ON customer_requests.card_type = item_types.type_id
            WHERE request_id='".$_GET['id']."'";
$sqlitem2 ="SELECT customer_requests.request_id, requests_status.status_name
            FROM customer_requests
            left JOIN requests_status ON customer_requests.request_status = requests_status.status_id
            WHERE request_id='".$_GET['id']."'";

$itemresult=mysqli_query($conn,$sqlitem);
$itemresult1=mysqli_query($conn,$sqlitem1);
$itemresult2=mysqli_query($conn,$sqlitem2);

$itemdata=mysqli_fetch_row($itemresult);
$itemdata1=mysqli_fetch_row($itemresult1);
$itemdata2=mysqli_fetch_row($itemresult2);

//Update relevent id in items table

if(isset($_POST['type'])){
$sql="UPDATE customer_requests
            SET 
            card_type='".$_POST['type']."',
            card_color='".$_POST['ccolor']."',
            card_texture='".$_POST['ctexture']."',
            Card_fontcolor='".$_POST['fcolor']."',
            card_count='".$_POST['icount']."',
            card_price='".$_POST['tprice']."',
            request_status=4
            WHERE request_id='".$_GET['id']."'";

    if(mysqli_query($conn,$sql)){
        echo " <script type='text/javascript'>alert('Confirmed!!!');location.href='customerRequests.php'</script>";                    
                                       
    }else{
        echo " <script type='text/javascript'>alert('Error Confirmed!!!');location.href='customerRequests.php'</script>";  
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href="common/loginCss.css">
<title>View Item</title>

</head>

<body>

<div class="top-container">
<img src="../../images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px> s     
</div>

<div class="header" id="myHeader">

<ul>
    <li><a href=../logout.php>| Logout</a></li>
    <li><a href="javascript:history.back()">| Back</a></li>
    <li><a href=../backToHome.php>| Home</a></li>
</ul>
</div>

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
                    pdfMake.createPdf(docDefinition).download("Customer_Reports_By_Date" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".pdf");
                }
            });
        }
    </script>

<div id="myDiv">

<div class="content">
    
    <form method='POST' >
    <h1 align=center style="color:url(0,0,40);font-family:"> View <?php echo $itemdata2[1]; ?> Item </h1>
    <table  border="1"align=center id="myTable"  style="width:60%;" cellpadding="10" >
        <tr>
            <td>Request Id: </td>
            <td> <input type="text" name="rid" value="<?php echo $itemdata[0]; ?>" required readonly></td>
        </tr>

        <tr>
            <td>User Id: </td>
            <td> <input type="text" name="uid" value="<?php echo $itemdata[1]; ?>" required readonly></td>
        </tr>

        <tr>
            <td>Request Date: </td>
            <td> <input type="text" name="rdate" value="<?php echo $itemdata[2]; ?>" required readonly></td>
        </tr>

        <tr>
            <td>Card Type: </td>
            <td> 
                <select name="type" >
                    <option value="<?php echo $itemdata[3]; ?>"><?php echo $itemdata1[1]; ?></option>
                    <option value="1">Birth Day</option>
                    <option value="2">Annyverssary</option>
                    <option value="3">New Year</option>
                    <option value="4">Christmas</option>
                    <option value="5">Easter</option>
                </select>
            </td> 
        </tr>

        <tr>
            <td>Card Color: </td>
            <td> <input type="text" name="ccolor" value="<?php echo $itemdata[4]; ?>" required ></td>
        </tr>
    
        <tr>
            <td>Card Texture: </td>
            <td> <input type="text" name="ctexture" value="<?php echo $itemdata[5]; ?>" required></td>
        </tr>

        <tr>
            <td>Photo: </td>
            <td><?php echo ' 
                  <img src="data:image/jpeg;base64,'.base64_encode($itemdata[6]).'" height="150" width="150" class="img-thumnail" />'?> 
                  * Photo Can't Update
            </td> 
        </tr>

        <tr>
            <td>Font Color: </td>
            <td> <input type="text" name="fcolor" value="<?php echo $itemdata[7]; ?>" required></td>
        </tr>

        <tr>
            <td>Count: </td>
            <td> <input type="text" name="icount" value="<?php echo $itemdata[8]; ?>" required></td>
        </tr>

        <tr>
            <td>Total Price(LKR): </td>
            <td> <input type="text" name="tprice" value="<?php echo $itemdata[9]; ?>" required></td>
        </tr>

        <tr>
            <td>Status: </td>
            <td> <input type="text" name="status" value="<?php echo $itemdata2[1]; ?>"readonly required></td>
        </tr>

        <tr>
            <td></td>                
            <td align="right" ><button  type="submit" class="btn btn-dark" style="background-color:green;color:white;margin:10px">Confirm</button>
            <button type="reset" class="btn btn-dark" style="background-color:red;color:white;">Reset</button></td>  
        </tr>
    </table>
    </form>
</div>
</div>

    <footer id="footer">
        <iframe 
            src="../../common/footer.php">
        </iframe>
    </footer>

</body>
</html>