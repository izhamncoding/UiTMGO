<?php
 
 session_start();
 
    include("dbconn.php");
?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UiTMGO Official</title>
        <link rel="stylesheet" type="text/css" href="./css/rider.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
    </head>
<body>
   <section class="header">
        <nav>
            <a href="rider.php"><img class="borderlogo" src="Images/uitmgologo.png"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="rider.php" > Main Page</a></li>
                    <li><a href="Rorderinfo.php" >Order Info</a></li>
                    <li><a href="RrevenueStatistic.php" >Revenue Statistic</a></li>
                    <li><a href="index.php" >Log Out</a></li>
                </ul>
            </div>  
       </nav> 
       <div class="hr1">
            <h1>Welcome</h1>
       </div><br>
       <div class="fullborder">
        <div class="text-box">
                <p>Rider Name: </p>
                <?php
                
                echo  $_SESSION['username'];
                
                ?>
        </div>
                <div class="borderchocolate">
                    
                    <p>Total Delivery: 
                    <?php
                          $delivery_query= " SELECT (order_id), (rider_id)
                          FROM 
                          orders
                          WHERE rider_id = '". $_SESSION['userid']."' ";
                          $delivery_query_run= mysqli_query($dbconn, $delivery_query);

                          if($delivery_total= mysqli_num_rows($delivery_query_run))
                          {
                            echo "$delivery_total";
                          }
                          else
                          {
                            echo 'No Data';
                          }
                     ?>
                    </p>
                    <p>Total Salary: RM 
                    <?php
                          $salary_query= "SELECT sum(total_payment*0.06) as 'Salary'
                          FROM 
                          order_detail
                          WHERE rider_id = '". $_SESSION['userid']."' ";
                          $salary_query_run= mysqli_query($dbconn, $salary_query);

                          while($rider = mysqli_fetch_array($salary_query_run)){
                            if($rider >  1){
                              echo round($rider['Salary']);
                            }
                          }
                     ?>
                    </p>
                 
           </div>
       </div>
    </section>
    
</body>
</html>