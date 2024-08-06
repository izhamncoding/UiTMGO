<?php
    session_start();
    include("dbconn.php");
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Revenue Statistic</title>
        <link rel="stylesheet" type="text/css" href="./css/rider.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
    </head>

    <style>
        th{
            text-align: center;
            background-color: #C1C1C1;
            padding: 2%;    
        }
        
        td{
            background-color: #f2f2f2;
            padding: 2%;
            text-align: center
            
        }

        table {
            width: 60%;
            font-size: 18px;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #ddd;
            border-collapse: collapse;
            border: 2px solid black;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
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
       <h1>SALARY STATISTIC</h1>
       </div>
        </nav>
        <div class=> 
           <div class="case">
                <?php
                    include("dbconn.php");
                    $sql="SELECT *,(payment.payment_amount*0.06) as 'salary'  FROM order_detail
                    INNER JOIN rider as rider ON
                    rider.rider_id = order_detail.rider_id
                    inner join vendor as v on v.vendor_id = rider.vendor_id 
                    INNER JOIN payment ON payment.order_detail_id = order_detail.order_detail_id
                    WHERE rider.rider_id ='". $_SESSION['userid']."' ";
                    $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
                    $row = mysqli_num_rows($query);
                    if($row == 0){
                        echo "No record found";
                    }
                    else{
                        echo"<table border=1>";
                        echo"<tr>";
                        echo"<th>salary ID</th>";
                        echo"<th>amount</th>";
                        echo"<th>Name</th>";
                        echo"<th>date</th>";
                        echo"</tr>";
                        while($row = mysqli_fetch_array($query)) {
                        echo"<tr>";
                        echo"<td>".$row["order_detail_id"]."</td>";
                        echo"<td>".round($row["salary"])."</td>";
                        echo"<td>".$row["vendor_name"]."</td>";
                        echo"<td>".$row["order_date"]."</td>";
                        echo"</tr>";
                        }
                        echo"</table>";
                    }

                ?>
                                <h1>Total Salary: RM 
                    <?php
                          $salary_query= "SELECT sum(payment.payment_amount*0.06) as 'Salary'
                          FROM order_detail
                          INNER JOIN payment ON payment.order_detail_id = order_detail.order_detail_id
                          WHERE rider_id = '". $_SESSION['userid']."' ";
                          $salary_query_run= mysqli_query($dbconn, $salary_query);

                          while($rider = mysqli_fetch_array($salary_query_run)){
                            if($rider >  1){
                              echo round($rider['Salary']);
                            }
                          }
                     ?>
                    </h1>
                 
           </div>
       </div>
       
       
    </section>
    
</body>
</html>