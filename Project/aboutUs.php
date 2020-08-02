<!DOCTYPE html>
<html>

    <?php

    
        include "common/dbConnection.php";
        include "common/cssjs.php";
            echo $csslib;
        
    ?>

<head>

    <title>About Us</title>
    <style>
        p.main1 {
            text-align: justify;
        }

        p.main2 {
            text-align: justify;
        }

        div.aa {
            background-color: lightgrey;
            width: auto;
            padding: 50px;
            margin: 10px;
        }

    </style>

</head>

<body style="background-color:#ffe6ff;">
    
    <div class="top-container">
        <img src="images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px>  
    </div>

    <div class="header" id="myHeader">

        <ul>
            <li><a href=login.php>| Login</a></li>
            <li><a href=registration.php>| Register</a></li>
            <li><a href=contact.php>| Contact Us</a></li>
            <li><a href=home.php>| Home</a></li>
        </ul>
    
    </div> 
    </br>

    <div style={width:100%;}>
        <div id="section" style="background-color:#ff80ff" style= "width:50px">
            <h1>About Us</h1>

            <div class="aa">
                <p >

                    <p class="main1">
                        Welcome to "Memorette Designs" , your number one source for greeting cards. We're dedicated to giving you the very creative of greeting cards, with a focus </br>
                        on customer service and uniqueness. Founded in 2015 by Kaveena Manage, "Memorette" has come a long way from its beginnings in a home office. When Kaveena </br>
                        Manage first started out, her passion for providing the creative greeting cards for small shops, drove her to quit her day job, and gave her the impetus to turn hard </br>
                        work and inspiration into to a booming online store. We now serve customers all over Sri Lanka, andare thrilled to be a part of the eco-friendly wing of the industry.
                    </p>

                    <p class="main2">
                        <br>We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
                    </p>
                    <p>
                        <br>Sincerely,
                        <br>Kaveena Manage, 
                        <br>Founder,
                        <br>Memorette Designs
                    </p>
                </p>   
            </div>

            <div id="section">

                <div class="w3-content w3-section" style="max-width:500px">
                    <img class="mySlides w3-animate-left" src="images/other_cards/1498965-Quilled-birthday-card-0.jpg" style="width:100%">
                    <img class="mySlides w3-animate-left" src="images/other_cards/maxresdefault.jpg" style="width:100%">
                    <img class="mySlides w3-animate-left" src="images/other_cards/paper-greeting-card.jpg" style="width:100%">
                    <img class="mySlides w3-animate-left" src="images/other_cards/81l18buFDNL._SL1500_.jpg" style="width:100%">
                </div>

                <script>
                    var myIndex = 0;
                    carousel();

                    function carousel() {
                        var i;
                        var x = document.getElementsByClassName("mySlides");
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";  
                        }
                        myIndex++;
                        if (myIndex > x.length) {myIndex = 1}    
                            x[myIndex-1].style.display = "block";  
                            setTimeout(carousel, 2500);    
                    }
                </script>

            </div>
        </div>
    </div>

</body>
</html>