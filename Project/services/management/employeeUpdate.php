<?php

    include "../../common/dbConnection.php";
    include "../../common/session.php";
    include "../../common/cssjs.php";
        echo $csslib;

    //View details of relevent item

    $sqlitem="SELECT * FROM users WHERE user_id ='".$_GET['id']."'";
    $itemresult=mysqli_query($conn,$sqlitem);
    $itemdata=mysqli_fetch_row($itemresult);

    if(isset($_POST['fname'])){

        if ($_POST['psw'] == ""){
            $pass =  $itemdata[8];
        }else{
            $pass = md5($_POST['psw']);
        }

        $sql=   "UPDATE users
                SET 
                    user_fname='".$_POST['fname']."',
                    user_lname='".$_POST['lname']."',
                    user_email='".$_POST['email']."',
                    user_mobile='".$_POST['contact']."',
                    user_address='".$_POST['address']."',
                    user_password='".$pass."'            
                WHERE user_id='".$_GET['id']."'";

        if(mysqli_query($conn,$sql)){
            echo " <script type='text/javascript'>alert('Update Success!!!');location.href='../employeeManagement.php'</script>"; 
                    
        }else{
            echo " <script type='text/javascript'>alert('error Update!!!');location.href='../employeeManagement.php'</script>";     
        mysqli_close($conn);
        }
    }
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="../../common/loginCss.css">
    <title>Update Employee </title>

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

    <form method='POST' border=5px action="">
        <div align=center>
            <table>

                <tr>
                    <td class="td">First name<span class="required">*</span></td>
                    <td class="td1"><input type="text" value="<?php echo $itemdata[1];?>" name="fname" pattern="[A-Za-z].{4,}" title="Minimum 05 Characters" required></td>
                </tr>

                <tr>
                    <td class="td">Last name</td>
                    <td class="td1"><input type="text" value="<?php echo $itemdata[2];?>" name="lname" pattern="[A-Za-z].{4,}" title="Minimum 05 Characters" required></td>
                </tr>

                <tr>
                    <td class="td">Email<span class="required">*</span></td>
                    <td class="td1"><input type="email" value="<?php echo $itemdata[3];?>" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ex:- test@gmail.com"  required></td>
                </tr>

                <tr>
                    <td class="td">Phone Number<span class="required">*</span></td>
                    <td class="td1"><input type="text" value="<?php echo $itemdata[4];?>" name="contact" pattern="[0-9]{10}" title="Ex:- 0771234567" required></td>
                </tr>

                <tr>
                    <td class="td">Address<span class="required">*</span></td>
                    <td class="td1"><input type="text" value="<?php echo $itemdata[5];?>" name="address" pattern="[A-Za-z].{4,}" title="Minimum 05 Characters" required></td>
                </tr>

                <tr>
                    <td class="td">Password<span class="required">*</span></td>
                    <td class="td1"><input type="password"  name="psw" pattern=".{5,}" title="Five or more characters" ></td>
                </tr>

                <tr>
                    <td class="td"></td>
                    <td class="td">
                        <table>  
                            <tr> 
                                <td>
                                    <div class="div">
                                        <input type="submit" value="Update" class="button"></button>
                                    </div> 
                                </td>               
                                <td>
                                    <div class="div">
                                        <button type="reset" class="button" style="background-color: #f44336;">Cancel</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>             
                </tr>
        
            </table>
        </div>
        <p style="float:left;">
            <span class="required" >*</span>Required fields
        </p>
	</form>

    <footer id="footer">
        <iframe 
            src="../../common/footer.php">
        </iframe>
    </footer>

</body>
</html>