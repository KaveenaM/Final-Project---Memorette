<!DOCTYPE html>
<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <Title>Admin Page</title>

  <?php

      include "../../common/dbConnection.php";
      include "../../common/cssjs.php";
      echo $csslib;

    //Get Year
    $year = date('y');
    $cardType = array("Birthday","Anniversary","New Year","Christmas","Easter","Other");
    $monthList = array("January","February","March","April","May","June","July","August","September","Octomber","November","December");

    //Get Month Name
    $month = $monthList[date('m')- 1];

  ?>

    <!-- Chart script-->
    <script src="../../common/code/highcharts.js"></script>
    <script src="../../common/code/modules/exporting.js"></script>
    <script src="../../common/code/modules/export-data.js"></script>

</head>

<body>

  <div class="top-container">
    <img src="../../images/logo_transparent.png" alt="Italian Trulli" width=300px height=200px> 
  </div>

  <div class="header" id="myHeader">

    <ul>
      <li><a href=../logout.php>| Logout</a></li>
      <li><a href=../profileEdit.php>| profile</a></li>
      <li><a href=../feedback.php>| Feedbacks</a></li>
      <li><a href=../reports/reports.php>| Reports</a></li>
      <li><a href=../customerManagement.php>| Customers</a></li>
      <li><a href=../employeeManagement.php>| Employees</a></li>
      <li><a href=managersManagement.php>| Managers</a></li>
      <li><a href=../orderManage.php>| Order Management</a></li>
      <li><a href=itemManagement.php>| Item Management</a></li>
    </ul>

  </div>

  <div class="content" >

    <!--Pie chart script -->
    <div class="content1" id="content1" style="min-width: 600px; height: 400px; max-width: 600px; float:left; "> 
  
      
      <script type="text/javascript">
        Highcharts.chart('content1', {
          chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
          },
          title: {
            text: '<?php echo $month ?> Orders'
          },
          tooltip: {
            pointFormat: '{series.card_type}: <b>{point.percentage:.1f}%</b>'
          },
          plotOptions: {
            pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                enabled: true,
                format: '<b>{point.card_type}</b>: {point.percentage:.1f} %'
              }
            }
          },
          series: [{
            insure_type: 'Brands',
            colorByPoint: true,
            data: [
                <?php
                  for($loopCount = 1; $loopCount <= count($cardType); $loopCount++){
                    $count = 0;
                    $sql = "SELECT COUNT(orders.item_id) AS 'type'
                    FROM Orders
                    INNER JOIN items
                    ON items.item_id=orders.item_id WHERE items.item_type=". $loopCount ." AND MONTH(orders.order_date)=MONTH(CURDATE()) AND YEAR(orders.order_date)=YEAR(CURDATE()) AND order_status = 2 ;";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result)>0){
                      while( $row=mysqli_fetch_assoc($result)){
                        $count =  $row['type'];
                        ?>
                          
                          {'card_type': '<?php echo $cardType[$loopCount-1]; ?>','y':<?php echo $count; ?>},

                        <?php 
                      }
                    }
                  }
                ?>
                
                ]
          }]
        });

      </script>
    </div>

    <!--Basic column chart -->
    <div class="content2" id="content2" style="min-width: 715px; height: 400px; max-width: 715px; float:right;">
    
      <figure class="highcharts-figure">
        
      </figure>
        <!-- Basic column chart script-->
      <script type="text/javascript">
        
        Highcharts.chart('content2', {
            chart: {
              type: 'column'
            },
            title: {
              text: ' <?php echo "20" . $year ?> Report'
            },
            subtitle: {
              text: 'Source: cards.lk'
            },
            xAxis: {
              categories: [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'Octomber',
                'November',
                'December'
              ],
              crosshair: true
            },
            yAxis: {
              min: 0,
              title: {
                text: 'Card orders of Year'
              }
            },
            tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
            },
            plotOptions: {
              column: {
                pointPadding: 0.2,
                borderWidth: 1
              }
            },
            series: [
              <?php 

                  for($loopCount = 1; $loopCount <= count($cardType); $loopCount++){

                    
                    ?>
                    {
                    name: '<?php echo $cardType[$loopCount-1]; ?>',
                    data: [
                    
                    <?php
                      

                      for($countMonth = 1;$countMonth<=12;$countMonth++){
                        
                        $sqlMonthEventCount = "SELECT COUNT(orders.item_id) AS 'monthCount' 
                        FROM orders
                        INNER JOIN items
                        ON items.item_id=orders.item_id
                        WHERE MONTH(orders.order_date)=MONTH('2020-". $countMonth ."-01') AND items.item_type=". $loopCount ." AND YEAR(orders.order_date)=YEAR(CURDATE()) AND order_status = 2 ;";
                        
                        $resultMonthEventCount = mysqli_query($conn, $sqlMonthEventCount);
                        
                        if(mysqli_num_rows($resultMonthEventCount)>0){
                          while( $row=mysqli_fetch_assoc($resultMonthEventCount)){
                            $monthCount =  $row['monthCount'];
                            echo $monthCount . ",";
                          }
                        }
                      }
                    ?>
                        ]
                    },
                    <?php
                  }
              ?>
            ]});
      </script>
    </div>

  </div>

    <footer id="footer">
        <iframe 
        src="../../common/footer.php">
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

</script>
