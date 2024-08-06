<?php
session_start();
    include("dbconn.php");
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Info</title>
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
            padding: 2%;
            text-align: center
        }

        table {
            width: 80%;
            font-size: 16px;
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
              
    <h1 style="text-align:center">List Of Orders</h1>
                <div class="row row-50">
                    <?php
                        $dbconn= mysqli_connect("localhost", "root", "","uitmgo") or die(mysqli_error($dbconn));
                        $newline = '\\n';
                        $sql="SELECT *,REPLACE(GROUP_CONCAT(M.MENU_NAME), ',' , CHAR(10)) as 'Ordered Items'
                        FROM order_detail as od 
                        inner join customer as c on c.customer_id = od.customer_id
                        inner join menu as m on m.menu_id = od.menu_id
                        inner join rider as r on r.rider_id = od.rider_id
                        inner join payment as p on p.order_detail_id = od.order_detail_id
                        WHERE r.rider_id = '". $_SESSION['userid']."' && od.order_status = 0
                        GROUP BY c.customer_id;";
                    
                        $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
                        $row = mysqli_num_rows($query);
	                       if($row == 0){
                              echo'<table>';
		                      echo'<tr>';
		                      echo'<th>ID</th>';
		                      echo'<th>Cust Name</th>';
		                      echo'<th>Phone</th>';
		                      echo'<th>Location</th>';
		                      echo'<th>Total</th>';
		                      echo'<th>List Items</th>';
                              echo'<th></th>';
		                      echo"</tr>";
                               
                              echo'<tr>';
                              echo'<td colspan=11 style="padding:2%">';
		                      echo "No record found";
                              echo'</td>';
                              echo'</tr>';
                              echo'</table>';
	                       } else{
		                      echo'<table>';
		                      echo'<tr>';
		                      echo'<th>ID</th>';
		                      echo'<th>Cust Name</th>';
		                      echo'<th>Phone</th>';
		                      echo'<th>Location</th>';
		                      echo'<th>Total</th>';
		                      echo'<th>List Items</th>';
                              echo'<th></th>';
		                      echo"</tr>";
		                      while($row = mysqli_fetch_array($query)) {
		                      echo"<tr>";
		                      echo'<td style="text-align:center">'.$row["order_detail_id"].'</td>';
		                      echo'<td class="divided" >'.$row["customer_name"].'</td>';
		                      echo'<td class="divided" >'.$row["customer_num"].'</td>';
                                  
		                      echo'<td style="text-">'.$row["customer_address"].'</td>';
		                      echo'<td style="text-align:center">'.$row["payment_amount"].'</td>';
		                      echo'<td class="divided">'.nl2br($row["Ordered Items"]).'</td>';
                              echo"<td><a href='update - order.php?orderid=".$row["customer_id"]."'>Confirm</a></td>";
		                      echo"</tr>";
		                  }
		                      echo"</table>";
	}
                    ?>
                </div>
    </section>
</body>
</html>