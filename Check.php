<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UiTMGO Official</title>
        <link rel="stylesheet" type="text/css" href="./css/customerelse.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
        
        <style>
        .extra {
            margin: 2%;      
        }  

        table {
            width: 70%;
            font-size: 15px;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
        }
          
          .active:hover{
              background-color:  #41A451;
              color: white;
          }
      </style>
    </head>
<body>
   <section class="header">
        <nav>
            <a href="index.html"><img class="borderlogo" src="Images/uitmgologo.png"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="customer.php">Home</a></li>
                    <li><a href="browse.php">Browse</a></li>
                    <li><a href="processdetail.php">Process Details</a></li>
                    <li><a href="addcart.php">Cart</a></li>
                    <li><a href="index.php">Log Out</a></li>
            </ul>
            </div>
       </nav>
       <div class="box"> 
           <section style="padding: 2% 0%">
              <div style="margin-left: auto;margin-right: auto;display: block;width: 45%;box-shadow: 1px 1px 15px 1px;border-radius: 5%;padding: 2%;background-color:white">
        <div style="padding: 9% 5%;">
            
            <div style="padding: 2% 3%">
            <p style="font-size: 35px;text-align: center;margin: 4% 0%">Current Orders</p>
            <hr>
                 <?php
                 $dbconn= mysqli_connect("localhost", "root", "","uitmgo") or die(mysqli_error($dbconn));
                 $sql="SELECT * FROM CUSTOMER AS C
                            INNER JOIN ORDERS AS O ON O.CUSTOMER_ID = C.CUSTOMER_ID
                            INNER JOIN ORDER_dETAIL AS D ON D.CUSTOMER_ID = C.CUSTOMER_ID
                            INNER JOIN MENU AS M ON M.menu_id = O.menu_id
                            JOIN vendor AS V ON V.vendor_id = D.vendor_id
                            JOIN RIDER AS R ON R.rider_id = O.rider_id
                            WHERE C.CUSTOMER_ID =".$_COOKIE["storeID"]." && O.VENDOR_ID = ".$_COOKIE["vendorID"]." 
                            GROUP BY O.vendor_id";
                    
                 $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
                
                 $row = mysqli_num_rows($query);
	                       if($row > 0){
		                      while($row = mysqli_fetch_array($query)) {
		                          echo '<div style="padding: 1% 0%;margin:1%;margin-left:auto;margin-right:auto;display:block;width:100%;text-align:center" id="cart">
                                            <div>
                                                <div style="font-size:15px">Order From ' .$row['vendor_name']. ' <br> Send to ' .$row['customer_name']. '<br> Phone Number : +60' .$row['customer_num']. '<br> Sent by ' .$row['rider_name']. '<br> Your Order ID is #' .$row['order_detail_id']. '</div>
                                            </div>
                                        </div>';
		                      }
                           }
            ?>
            <br>    
            <hr>
                <?php
                 $dbconn= mysqli_connect("localhost", "root", "","uitmgo") or die(mysqli_error($dbconn));
                 $sql="SELECT * FROM ORDER_dETAIL AS D
                            INNER JOIN ORDERS AS O ON O.ORDER_ID = D.ORDER_ID
                            INNER JOIN CUSTOMER AS C ON C.CUSTOMER_ID = D.CUSTOMER_ID
                            INNER JOIN MENU AS M ON M.menu_id = O.menu_id
                            JOIN vendor AS V ON V.vendor_id = D.vendor_id
                            JOIN RIDER AS R ON R.rider_id = O.rider_id
                            JOIN PAYMENT AS P ON P.ORDER_dETAIL_ID = D.ORDER_dETAIL_ID
                            WHERE C.CUSTOMER_ID =".$_COOKIE["storeID"]." && O.VENDOR_ID = ".$_COOKIE["vendorID"]." && D.ORDER_STATUS = 0
                            GROUP BY O.MENU_ID";
                    
                 $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
                 $row = mysqli_num_rows($query);
                
                        echo'<br><table>';
                        echo'<th style="text-align:left">Item Name</th>';
                        echo'<th>QTY</th>';
                        echo'<th>Price</th>';
                        echo'<th>Total Amount</th>';
	                       if($row > 0){
		                      while($row = mysqli_fetch_array($query)) {
		                          echo '<tr>
                                            <td>
                                                ' .$row['menu_name']. '
                                            </td>
                                            
                                            <td style="text-align:center">
                                                ' .$row['order_quantity']. '
                                            </td>
                                                
                                            <td style="text-align:center">
                                                RM ' .$row['menu_price']. '
                                            </td>
                                            
                                            <td style="text-align:center">
                                                RM ' .$row['menu_price'] * $row['order_quantity']. '
                                            </td>
                                        </tr>';
		                      }
                           }
                        echo '</table>';
                echo'<br>';
            ?>
            
            <hr>
            <div style="padding: 0% 10% 0% 15%">
            <?php    
                $sql="SELECT * FROM CUSTOMER AS C
                    JOIN order_detail AS D ON D.customer_id = C.CUSTOMER_ID
                    JOIN PAYMENT AS P ON P.order_detail_id = D.order_detail_id
                    JOIN vendor AS V ON V.vendor_id = D.vendor_id
                    WHERE D.order_status = 0 && C.customer_id = ".$_COOKIE['storeID']." && V.vendor_id = ".$_COOKIE['vendorID']."
                    GROUP BY D.customer_id";
                    
                 $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
                 $row = mysqli_num_rows($query);
	                       if($row > 0){
		                      while($row = mysqli_fetch_array($query)) {
		                          echo '<p name="total" style="float: left;font-size: 20px;margin: 2% 0%" id="total">Total Price</p>
                                  <p name="total" style="float: right;font-size: 20px;margin: 2% 0%" id="total">RM '.$row['payment_amount'].'</p><br>';
		                      }
                           }
            ?>
                
            </div>
        </div>
            
            <div style="padding: 2%;margin: 2%;text-align: center"><b>Your Order is currently being delivered</b> <br>We will make sure to notify you regarding your orders<br><h6 style="font-size:13px">If you think there is a mistake, feel free to reach our support at +6013-0888333</h6></div>
            <hr>
            <br>
            
            <div style="margin:0% 5%;display:block">
                <a href="processdetail.php" class="button-white button-sm select" style="width:50%;text-align: center;font-size: 15px;background-color: #41A451;padding: 3%;color: black;text-decoration:none;float:left"><b>Back</b></a>
                <a href="customer.php" class="button-white button-sm select" style="width:50%;text-align: center;font-size: 15px;background-color: #41A451;padding: 3%;color: black;text-decoration:none;float:left;border-left:2px solid white"><b>Go to Main </b></a>
            </div>
    </div>
              </div>
      </section>
       </div>
    </section>
    
    <script>
        function checkVendor(target){
            if(document.getElementById("vendor").value == 2){
                window.location.href = "customer2.php";
            } else if(document.getElementById("vendor").value == 1){
                window.location.href = "customer.php";
            }
        }
    </script>
    <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
    <script src="assets/js/main.js"></script>
</body>
</html>