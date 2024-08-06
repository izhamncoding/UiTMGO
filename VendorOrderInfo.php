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
            padding: 1%;    
        }
        
        td{
            padding: 2%;
            text-align: center
        }

        table {
            width: 80%;
            font-size: 12px;
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
            <a href="VendorHome.php"><img class="borderlogo" src="Images/uitmgologo.png"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="VendorListMenu.php" >List Menu</a></li>
                    <li><a href="VendorEdit.php" >Edit</a></li>
                    <li><a href="VendorOrderInfo.php" >Order Info</a></li>
                    <li><a href="VendorSales.php" >Sales</a></li>
                    <li><a href="index.php">Log Out</a></li>

                </ul>
            </div>  
       </nav> 
              
    <h1 style="text-align:center">List Of Orders</h1>
                <div class="row row-50">
                    <?php
                        $dbconn= mysqli_connect("localhost", "root", "","uitmgo") or die(mysqli_error($dbconn));
                        $newline = '\\n';
                        $sql="
                        SELECT * FROM order_detail
                        inner join customer ON
                        customer.customer_id = order_detail.customer_id
                        inner join menu ON
                        menu.menu_id = order_detail.menu_id
                        inner join rider ON
                        rider.rider_id = order_detail.rider_id
                        inner join payment ON
                        payment.order_detail_id = order_detail.order_detail_id
                        inner join vendor ON
                        order_detail.vendor_id = vendor.vendor_id
                        where vendor.vendor_id = '".$_SESSION['vendorid']."' ";
                        
                        
                    
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
		                      echo'<td class="divided">'.nl2br($row["menu_name"]).'</td>';
                              
		                      echo"</tr>";
		                  }
		                      echo"</table>";
	}
                    ?>
                </div>
    </section>
</body>
</html>