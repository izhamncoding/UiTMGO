<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sales</title>
        <link rel="stylesheet" type="text/css" href="./css/vendorsales.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
    </head>
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
       
       
       <div class="hr1">
            <h1>Welcome</h1>
       </div>div>
       
       
       <div class="fullborder" >
           <div class="case">
           
           <h1> TOTAL SALES </h1>
           
         <?php
                    session_start();
                    include("dbconn.php");
               
                        
                    //where vendor.vendor_id = '".$_SESSION['vendorid']."'
               
                    $sql="
                    SELECT vendor.vendor_id,vendor.vendor_name,orders.customer_id,orders.vendor_id,menu.menu_name, sum(order_detail.total_quantity*menu.menu_price) as totalPerCust FROM orders 
                    INNER JOIN order_detail ON 
                    orders.order_id=order_detail.order_id 
                    inner join menu on
                    order_detail.menu_id=menu.menu_id
                    inner join vendor on 
                    orders.vendor_id=vendor.vendor_id 
                    inner join customer ON 
                    orders.customer_id = customer.customer_id 
                    where vendor.vendor_id = '".$_SESSION['vendorid']."'
                    group by vendor_name;";
               
                    $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
                    $row = mysqli_num_rows($query);
               
               
                    if($row == 0){
                        echo "No record found";
                    }
               
                    else{
                        
                        
                        
                        echo"<table border=1>";
                        echo"<tr>";
                        echo"<th>Vendor ID</th>";
                        echo"<th>Name</th>";
                        echo"<th>Total Revenue</th>";
                 
                      
                        echo"</tr>";
                        while($row = mysqli_fetch_array($query)) {
                        echo"<tr>";
                        echo"<td>".$row["vendor_id"]."</td>";
                        echo"<td>".$row["vendor_name"]."</td>";
                        echo"<td>RM ".$row["totalPerCust"]."</td>";
                        echo"</tr>";
                        }
                        echo"</table>";
                    }

                    ?>
               
               <br> <br> <br>
               
               <h1>CUSTOMER DETAILS</h1>
               <?php
                    $sql="
                    SELECT orders.order_id,vendor.vendor_name,orders.customer_id,customer.customer_name,order_date,orders.vendor_id,menu.menu_name, (order_detail.total_quantity*menu.menu_price) as totalPerCust 
                    FROM orders 
                    INNER JOIN order_detail ON 
                    orders.order_id=order_detail.order_id 
                    inner join menu on 
                    order_detail.menu_id=menu.menu_id 
                    inner join vendor on 
                    orders.vendor_id=vendor.vendor_id 
                    inner join customer ON 
                    orders.customer_id = customer.customer_id
                    where vendor.vendor_id = '".$_SESSION['vendorid']."'
                    group by customer_name;";
               
                    $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
                    $row = mysqli_num_rows($query);
                    if($row == 0){
                        echo "No record found";
                    }
                    else{
                        echo"<table border=1>";
                        echo"<tr>";
                        
                        echo"<th>Order ID</th>";
                        echo"<th>Vendor</th>";
                        echo"<th>Customer Name</th>";
                        echo"<th>Date</th>";
                        echo"<th>Vendor ID</th>";
                        echo"<th>Menu Name</th>";    
                        echo"<th>Payment </th>";
                      
                        echo"</tr>";
                        
                        while($row = mysqli_fetch_array($query)) {
                        echo"<tr>";
                        echo"<td>".$row["order_id"]."</td>";
                        echo"<td>".$row["vendor_name"]."</td>";
                        echo"<td>".$row["customer_name"]."</td>";
                        echo"<td>".$row["order_date"]."</td>";
                        echo"<td>".$row["vendor_id"]."</td>";
                        echo"<td>".$row["menu_name"]."</td>";    
                        echo"<td> RM ".$row["totalPerCust"]."</td>";
                        echo"</tr>";
                        }
                        echo"</table>";
                    }
                ?>
           </div>
       </div>
       
       
    </section>
    
</body>
</html>