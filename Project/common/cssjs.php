<?php

    $csslib=
    
    "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css\">
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js\"></script>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css\"/>
    <script type=\"text/javascript\" src=\"https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js\"></script>
    <link rel=\"stylesheet\" href=\"https://www.w3schools.com/w3css/4/w3.css\">
    <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
    "
    
?>

<html>
<head>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color:#ffe6ff;
        }

        .top-container {
            background-color: #330033;
            text-align: center;
        }

        .header {
            padding: 10px 16px;
            background: #555;
            color: #ffb3ff;
        }

        .content {
            padding: 16px;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }

        .sticky + .content {
            padding-top: 102px;
        }

        ul {
            list-style-type: none;
            width:100%;
            height:30px;
            margin: 0;
            padding:0;
            overflow: hidden;
        }

        li {
            float: right;
        }

        li a {
            display: block;
            color: white;
            font-size:20px;
            text-align: center;
            padding-right:15px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #111;
        }

        #myTable {
            align:center;
            width: 100%;
            border: 1px solid rgb(0,0,40);
            font-size: 12px;
            background-color:#ffe6ff;
        }

        #myTable th, #myTable td {
            text-align: center;
            padding: 12px;
            color:white;
            font-size:15px;
            font-family:Tahoma, Geneva, sans-serif;
        }

        #myTable th{
            background-color:#330033;
        }

        #myTable td{
            color:#000000;
        }

        #myTable tr {
            border-bottom: 1px solid rgb(0,0,40);
        }

        #myTable tr.header, #myTable tr:hover {
            background-color:#e6b3e6;
        }

        footer{
            padding: 10px 16px;
            background: #555;
        }
        
        iframe{
            width:100%;
            background-color:#330033;
            height:220px;
        }

        .required {
            color: yellow;
        }

        h1{
            text-align:center;
        }

        #btnExport{
        background-color:black;
        color:#e6e6ff;
        border-radius: 15px;
        margin-left:10px;
        height:50px;
      
      }
    

    </style>
</head>
</html>