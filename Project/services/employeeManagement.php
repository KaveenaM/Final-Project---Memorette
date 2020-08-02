<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <Title>Manager Page</title>

    <?php

        include "../common/dbConnection.php";
        include "../common/session.php";
        include "../common/cssjs.php";
        echo $csslib;
        
    ?>
</head>

<body>

    <div class="top-container">
        <img src="../images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px> s     
    </div>

    <div class="header" id="myHeader">

        <ul>
            <li><a href=../logout.php>| Logout</a></li>
            <li><a href=backToHome.php>| Home</a></li>
            <li>
                <div class="text-center">
                    <a href="" data-toggle="modal" data-target="#eForm1">| Add Employee</a>
                </div>
            </li>
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
                    <h3><strong>Add Employee</strong></h3>
                </div>

                <form method="POST" action="management/addEmployee.php" enctype="multipart/form-data">
                    <div class="modal-body mx-4" style="background-color:#330033;color:white;font-family:Arial, Helvetica, sans-serif;font-size:20px;">
                        
                        <div class="md-form mb-5">
                            <label>First Name :</label><span class="required">*</span>
                            <input type="text" name="fname" class="form-control validate" placeholder="Enter First Name" pattern="[A-Za-z].{4,}" title="Minimum 05 Characters" required style="background-color:#bfbfbf;color:black;">
                        </div>

                        <div class="md-form mb-5">
                            <label>Last Name :</label><span class="required">*</span>
                            <input type="text" name="lname" class="form-control validate" placeholder="Enter Last Name"  pattern="[A-Za-z].{4,}" title="Minimum 05 Characters" style="background-color:#bfbfbf;color:black;">
                        </div>

                        <div class="md-form mb-5">
                            <label>Email :</label>
                            <input type="text" name="email" class="form-control validate" placeholder="Enter Email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ex:- test@gmail.com"required style="background-color:#bfbfbf;color:black;">
                        </div>

                        <div class="md-form mb-5">
                            <label>Contact :</label>
                            <input type="text" name="mobile" class="form-control validate" placeholder="Enter Contact Number" pattern="[0-9]{10}" title="Ex:- 0771234567" required style="background-color:#bfbfbf;color:black;">
                        </div>

                        <div class="md-form mb-5">
                            <label>Address :</label><span class="required">*</span>
                            <input type="text" name="address" class="form-control validate" placeholder="Enter Address" pattern="[A-Za-z].{4,}" title="Minimum 05 Characters" required style="background-color:#bfbfbf;color:black;">
                        </div>

                        <div class="md-form mb-5">
                            <label>Password :</label><span class="required">*</span>
                            <input type="password" name="psw" class="form-control validate" placeholder="Enter Password" pattern=".{5,}" title="Five or more characters" required style="background-color:#bfbfbf;color:black;">
                        </div>
                    
                        <div class="text-center mb-3" style="background-color:330033;">
                            <div>
                                <input class="btn btn-primary" type="submit" value="Submit" style="background-color:#1a001a;" >
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
        <table border="1" align=center id="myTable">
               
            <tr>  
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Phone Number</th> 
                <th>Address</th>     
                <th> Actions </th>                     

            </tr>  

            <?php  

                //View all items relevent to logged user

                $sql2 = " SELECT * FROM users where user_type = 3" ;  

                $result2 = mysqli_query($conn, $sql2);

                if(mysqli_num_rows($result2) > 0){

                    while($row = mysqli_fetch_array($result2)){  

            ?>  
            <tr>  
                <td><?php echo $row['user_fname'];?></td>
                <td><?php echo $row['user_lname'];?></td>
                <td><?php echo $row['user_email'];?></td>
                <td><?php echo $row['user_mobile'];?></td>                   
                <td><?php echo $row['user_address'];?></td>
                <td>
                    <a onClick="javascript: return confirm('Are you sure want to Update?');" href="management/employeeUpdate.php ?id=<?php echo $row['user_id'];?>" class="btn btn-dark" type="button" style="background-color:green;color:white;margin:10px"> Update </a>
                    <a onClick="javascript: return confirm('Are you sure want to Delete?');" href="management/employeeDelete.php ?id=<?php echo $row['user_id'];?>" class="btn btn-dark" type="button" style="background-color:red;color:white;"> Delete </a> 
                </td>
                    
            </tr> 
            <?php
                    }
                }else{
                    echo "<tr>";
                    echo "<td colspan='9'>No record found.</td>";
                    echo "</tr>";
                } 
                
            ?>

        </table>
    </div>

    <footer id="footer">
        <iframe 
        src="../common/footer.php">
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
