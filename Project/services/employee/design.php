<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<Title>Customize</title>

<?php

    include "../../common/dbConnection.php";
    include "../../common/cssjs.php";
      echo $csslib;

      if(isset($_POST['submit'])){

        $item_name=$_POST['item_name'];
        $item_type=$_POST['item_type'];
        $item_description=$_POST['item_description'];
        $item_price=$_POST['item_price'];
        $item_count=$_POST['item_count'];


        $img = addslashes(file_get_contents($_FILES['image']["tmp_name"]));  
        $sql01="INSERT INTO item_designs(item_id,item_name,item_type,item_description,design_photo,item_price,item_count,item_adddate) VALUES('".$_GET['id']."','".$item_name."','".$item_type."','".$item_description."','".$img."','".$item_price."','".$item_count."',now())";
        


        if(mysqli_query($conn,$sql01)){
          echo " <script type='text/javascript'>alert('Design Add Success!!!');</script>"; 
            
        }else{
          echo " <script type='text/javascript'>alert('Error Add Design!!!');</script>"; 
        }
        
    }    
    
?>


</head>
<body>

  <div class="top-container">
    <img src="../../images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px>  
  </div>

  <div class="header" id="myHeader">

    <ul>
        <li><a href=../logout.php>| Logout</a></li>
        <li><a href=itemManagement.php>| Item Management</a></li>
        <li>
            <div class="text-center">
                <a href="" data-toggle="modal" data-target="#eForm1">| Add Designs</a>
            </div>
        </li>
        <li><a href=../backToHome.php>| Home</a></li>
    </ul>

  </div> <br>
  <!-- ADD NEW ITEM MODEL FORM -->
  <?php
    $sql2 = "SELECT * FROM items WHERE item_id='".$_GET['id']."'";

    $result2 =mysqli_query($conn,$sql2);
    $row2 =mysqli_fetch_row($result2);
?> 

  <div class="modal fade" id="eForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        
        <div class="modal-dialog" role="document">
        <div class="modal-content form-elegant">

        <div class="modal-header text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h3><strong>Add Designs</strong></h3>
        </div>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="modal-body mx-4" style="background-color:#330033;color:white;font-family:Arial, Helvetica, sans-serif;font-size:20px;">
                
            <input type="hidden" name="item_name" value = "<?php echo $row2[1];?>" class="form-control validate"  style="background-color:#bfbfbf;color:black;height:80px"> 
            <input type="hidden" name="item_type" value = "<?php echo $row2[2];?>" class="form-control validate"  style="background-color:#bfbfbf;color:black;height:80px"> 
            <input type="hidden" name="item_description" value = "<?php echo $row2[3];?>" class="form-control validate"  style="background-color:#bfbfbf;color:black;height:80px">
            <input type="hidden" name="item_price" value = "<?php echo $row2[5];?>" class="form-control validate"  style="background-color:#bfbfbf;color:black;height:80px">
            <input type="hidden" name="item_count" value = "<?php echo $row2[6];?>" class="form-control validate"  style="background-color:#bfbfbf;color:black;height:80px"> 


                <div class="md-form mb-5">
                    <label>Item Photo</label><span class="required">*</span>
                    <input type="file" name="image" id="image" class="form-control validate" placeholder="Pleace Enter Image Of Your Item" style="background-color:#bfbfbf;color:black;height:80px"> 
                </div>
            
                <div class="text-center mb-3" style="background-color:330033;">
                    <div>
                        <input class="btn btn-primary" name="submit" type="submit" value="Submit" style="background-color:#1a001a;" >
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

<?php
  $sql = "SELECT * FROM item_designs WHERE item_id='".$_GET['id']."'";


  $result = mysqli_query($conn, $sql); 
  

  if(mysqli_num_rows($result)>0){
  while ($row = mysqli_fetch_array($result)){
?> 

<div class="container" style="font-family: Arial, Helvetica, sans-serif;font-size:20px;background-color:#d6d6c2;">  
  <div class="row" >
    <div class="col-sm-4">
      <div class="panel panel-default"  id="id" style="background-color:#ffe6ff;">

        <div class="panel-body"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['design_photo'] ).'" height="220px" width="200px" class="img-thumnail" />'?>
        <a onClick="javascript: return confirm('Are you sure want to Delete?');" href="designDelete.php ?id=<?php echo $row['design_id'];?>" class="btn btn-dark" type="button" style="background-color:red;color:white;margin:10px"> Delete </a>
        </div>
        


      </div>
    </div>
    <?php
          } } else{
             
            ?>
            <div class="container" style="font-family: Arial, Helvetica, sans-serif;font-size:20px;background-color:#d6d6c2;">  
  <div class="row" >
    <div class="col-sm-4">
      <div class="panel panel-default"  id="id" style="background-color:#ffe6ff;">

        <div class="panel-body"> <?php echo "No Designs Available"; ?> </div>


      </div>
    </div>
    <?php
          }
    ?>
<footer id="footer">
        <iframe 
            src="../../common/footer.php">
        </iframe>
    </footer>
 
</body>
</html>
