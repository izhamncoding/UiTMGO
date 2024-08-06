

<?php
    include("dbconn.php");
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UiTMGO Official</title>
        <link rel="stylesheet" type="text/css" href="./css/admin1.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
    </head>
<body>
   <section class="header">
        <nav>
            <a href="index.php"><img class="borderlogo" src="Images/uitmgologo.png"></a>
            
            <div class="navbar">
             
               
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="admin.php">Admin Home</a></li>
                    <li><div class="dropdown">
            
                      <button onclick="myFunction()" class="dropbtn">List & Edit</button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="editadmin.php"  >Admin</a> 
                        <a href="editcustomer.php"  >Customer</a>
                        <a href="editrider.php"  >Rider</a>
                        <a href="editvendor.php"  >Vendor</a>
                        
                      </div>
                        </div>
                   </li> 

                    <li><a href="revenuestatisticadmin.php"  >Revenue Statistic</a></li>
                    <li><a href="index.php"  >Log Out</a></li>
                   


                </ul>

            </div>
        </nav>
       <div class="fullborder">
           <div class="case">
               <center>
                   <p style="font-size:25px; text-shadow: 2px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Daily Rider Salary</p>
                <?php
                    include("dbconn.php");
                    $sql="SELECT *,(order_detail.total_payment*0.06) as 'salary' FROM order_detail
                    INNER JOIN rider ON 
                    rider.rider_id = order_detail.rider_id
                   ";
                    $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
                    $row = mysqli_num_rows($query);
                    if($row == 0){
                        echo "No record found";
                    }
                    else{
                        echo"<table border=1>";
                        echo"<tr>";
                        echo"<th>Order ID</th>";
                        echo"<th>amount</th>";
                        echo"<th>Name</th>";
                        echo"<th>date</th>";
                        echo"</tr>";
                        while($row = mysqli_fetch_array($query)) {
                        echo"<tr>";
                        echo"<td>".$row["order_id"]."</td>";
                        echo"<td>".round($row["salary"])."</td>";
                        echo"<td>".$row["rider_name"]."</td>";
                        echo"<td>".$row["order_date"]."</td>";
                        echo"</tr>";
                        }
                        echo"</table>";
                    }

                ?>
               <br>
                    <p style="font-size:25px; text-shadow: 2px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Total Alltime Salary Rider </p>
               <?php
                    include("dbconn.php");
                    $sql="SELECT *,sum(order_detail.total_payment*0.06) as 'salary' FROM order_detail
                    INNER JOIN rider ON 
                    rider.rider_id = order_detail.rider_id
                   ";
                    $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
                    $row = mysqli_num_rows($query);
                    if($row == 0){
                        echo "No record found";
                    }
                    else{
                        echo"<table border=1>";
                        echo"<tr>";
                        echo"<th>Order ID</th>";
                        echo"<th>amount</th>";
                        echo"<th>Name</th>";
                        echo"<th>date</th>";
                        echo"</tr>";
                        while($row = mysqli_fetch_array($query)) {
                        echo"<tr>";
                        echo"<td>".$row["order_id"]."</td>";
                        echo"<td>".round($row["salary"])."</td>";
                        echo"<td>".$row["rider_name"]."</td>";
                        echo"<td>".$row["order_date"]."</td>";
                        echo"</tr>";
                        }
                        echo"</table>";
                    }

                ?>
               
               <br>
                   <p style="font-size:25px; text-shadow: 2px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Daily Vendor Salary</p>
             <?php
                    include("dbconn.php");
                    $sql="
                    SELECT orders.order_id,vendor.vendor_name,orders.customer_id,customer.customer_name,order_date,orders.vendor_id,menu.menu_name, (order_detail.total_quantity*menu.menu_price) as totalPerCust FROM orders INNER JOIN order_detail ON orders.order_id=order_detail.order_id inner join menu on order_detail.menu_id=menu.menu_id inner join vendor on orders.vendor_id=vendor.vendor_id inner join customer ON orders.customer_id = customer.customer_id group by customer_name;";
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
                        echo"<th>Date</th>";
                        echo"<th>Menu</th>";
                        echo"<th>Payment</th>";
                      
                        echo"</tr>";
                        while($row = mysqli_fetch_array($query)) {
                        echo"<tr>";
                        echo"<td>".$row["order_id"]."</td>";
                        echo"<td>".$row["vendor_name"]."</td>";
                        echo"<td>".$row["order_date"]."</td>";
                        echo"<td>".$row["menu_name"]."</td>";
                        echo"<td>RM ".$row["totalPerCust"]."</td>";
                        echo"</tr>";
                        }
                        echo"</table>";
                    }

                ?>
               
                
               
               <br><br>
                   <p style="font-size:25px; text-shadow: 2px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Daily Vendor Orders</p>
             <?php
                    include("dbconn.php");
                    $sql="
                    SELECT orders.order_id,vendor.vendor_name,orders.customer_id,customer.customer_name,order_date,orders.vendor_id,menu.menu_name, (order_detail.total_quantity*menu.menu_price) as totalPerCust FROM orders INNER JOIN order_detail ON orders.order_id=order_detail.order_id inner join menu on order_detail.menu_id=menu.menu_id inner join vendor on orders.vendor_id=vendor.vendor_id inner join customer ON orders.customer_id = customer.customer_id group by customer_name;";
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
                        
                        echo"<th>Payment </th>";
                      
                        echo"</tr>";
                        while($row = mysqli_fetch_array($query)) {
                        echo"<tr>";
                        echo"<td>".$row["order_id"]."</td>";
                        echo"<td>".$row["vendor_name"]."</td>";
                        echo"<td>".$row["customer_name"]."</td>";
                        echo"<td>".$row["order_date"]."</td>";
                        echo"<td> RM ".$row["totalPerCust"]."</td>";
                        echo"</tr>";
                        }
                        echo"</table>";
                    }

                ?>
               <br><br>
                   <p style="font-size:25px; text-shadow: 2px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Total Alltime Vendor Revenue</p>
             <?php
                    include("dbconn.php");
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
               </center>
           </div>
       </div>
      
    </section>
    
    <script>

        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        window.onclick = function(e) {
                if (!e.target.matches('.dropbtn')) {
                    var myDropdown = document.getElementById("myDropdown");
                    if (myDropdown.classList.contains('show')) {
                        myDropdown.classList.remove('show');
                    }
                }
            } 
    </script>
    
</body>
</html>