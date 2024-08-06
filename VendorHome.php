

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
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
       </div> div>
       <div class="fullborder">
        <div class="case">
            
                <?php

                    session_start();
                    include("dbconn.php");
            
                    echo "<h1> Vendor name : ". $_SESSION['username']. "</h1>";

                ?>
            
 
            
        </div>
            <div class="borderchocolate">
                
                <div class="case">
                
                <p>Total Menu: 
                   
                    <?php
               
                    $sql="
                    SELECT * 
                    FROM menu
                    INNER JOIN vendor ON
                    menu.vendor_id = vendor.vendor_id
                    WHERE vendor.vendor_id = '".$_SESSION['vendorid']."'" ;
                    
               
                    $query = mysqli_query($dbconn, $sql);
                
                         if($row = mysqli_num_rows($query))
                          {
                            echo "$row";
                          }
                          else
                          {
                            echo 'No Data';
                          }
                    
                    
                    ?>
                    
                    </p>
                    
                <p>Total Sale: 
                    
                    <?php
               
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
               
                    else
                                                                                 
                        
                        while($row = mysqli_fetch_array($query)) {
                                                                          
                        echo"RM ".$row["totalPerCust"];
                        
                        }
                        
                    
                    
                    ?>
                    
                    
                    
                    </p>
                    
                    
                <p>Total Customer: 
                    
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
               
                    $query = mysqli_query($dbconn, $sql);
                
                         if($row = mysqli_num_rows($query))
                          {
                            echo "$row";
                          }
                          else
                          {
                            echo 'No Data';
                          }
                ?>
                                                                              
                    </p>
                    
                </div>
                
                
            </div>
       </div>
    </section>
    
</body>
</html>