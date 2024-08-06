<?php
    include("dbconn.php");
    session_start();
    $customer = $_SESSION["username"];
    $product = $_COOKIE["getID"];
    $total = $_COOKIE["total"];
    $vendor = $_SESSION["vendor"];
    $quantity = $_COOKIE["quantity"];
    $check = false;

    $id = "SELECT customer_id FROM CUSTOMER WHERE customer_name = '".$customer."'";
    $custid = mysqli_query($dbconn,$id) or die ("Error: " . mysqli_error($dbconn));
    $custrow = mysqli_num_rows($custid);
    while($custrow > 0){
        if($custrow = mysqli_fetch_assoc($custid)){
            $_SESSION['Latest'] = $custrow["customer_id"];
            $latestid = $_SESSION['Latest'];
        }
    }

    $checkid = "SELECT * FROM `order_detail` WHERE customer_id = ".$latestid." && order_status = 0";
    $ckid = mysqli_query($dbconn,$checkid) or die ("Error: " . mysqli_error($dbconn));
    $ckrow = mysqli_num_rows($ckid);
    while($ckrow > 0){
        if($ckrow = mysqli_fetch_assoc($ckid)){
            $check =true;
        }
    }


    if($check != true){
        $tok = strtok($product, ";");
        while ($tok !== false) {
            $sql = "INSERT INTO `orders`(`customer_id`, `vendor_id`, `rider_id`, `menu_id`) VALUES (".$latestid.",".$vendor.",NULL,".$tok.")";
            mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));

            $sql2 = "INSERT INTO `order_detail`(`customer_id`, `vendor_id`, `rider_id`, `menu_id`) VALUES (".$latestid.",".$vendor.",NULL,".$tok.")";
            mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));

            $tok = strtok(";");
        }

        $oid = "SELECT order_id FROM orders WHERE customer_id = ".$latestid." && order_quantity is NULL";
        $orderid = mysqli_query($dbconn,$oid) or die ("Error: " . mysqli_error($dbconn));
        $orderrow = mysqli_num_rows($orderid);

        $arrayOrder = [];
        $count = 0;
        while($orderrow > 0){
            if($orderrow = mysqli_fetch_assoc($orderid)){
                    $arrayOrder[$count] = $orderrow["order_id"];
                    $count++;
                }
            }

            $tok1 = strtok($quantity, ";");
            $arrayQuantity = [];
            $count =0;

            while ($tok1 !== false) {
                $arrayQuantity[$count] = $tok1;
                $count++;
                $tok1 = strtok(";");
            }

        $od = "SELECT * FROM order_detail as od
               join menu as m on m.menu_id = od.menu_id 
               where od.customer_id = ".$latestid." && od.order_id is NULL";
        $orderd = mysqli_query($dbconn,$od) or die ("Error: " . mysqli_error($dbconn));
        $detailrow = mysqli_num_rows($orderd);

        $arrayDetail = [];
        $arrayTotal = [];
        $count = 0;
        while($detailrow > 0){
            if($detailrow = mysqli_fetch_assoc($orderd)){
                    $arrayDetail[$count] = $detailrow["order_detail_id"];
                    $count++;
                }
            }

        $rider = "SELECT FLOOR(RAND()*((SELECT rider_id from rider order by rider_id desc limit 1)-(SELECT rider_id from rider order by         rider_id asc limit 1)+1))+(SELECT rider_id from rider order by rider_id asc limit 1) as Random";
        $riderRand = mysqli_query($dbconn,$rider) or die ("Error: " . mysqli_error($dbconn));
        $riderRow = mysqli_num_rows($riderRand);

        while($riderRow > 0){
            if($riderRow = mysqli_fetch_assoc($riderRand)){
                    $rideRandom = $riderRow["Random"];
                }
            }

        $count = 0;
        for($x = 0; $x < count($arrayQuantity);$x++){
            $updateQ = "UPDATE `orders` SET `order_quantity`=".$arrayQuantity[$x].",`rider_id`=".$rideRandom." WHERE ORDER_ID = ".$arrayOrder[$x]."";
            mysqli_query($dbconn,$updateQ) or die ("Error: " . mysqli_error($dbconn));

            $updateQ2 = "UPDATE `order_detail` SET `total_quantity`=".$arrayQuantity[$x].", `order_id` = ".$arrayOrder[$x].",`rider_id`=".$rideRandom." WHERE ORDER_DETAIL_ID = ".$arrayDetail[$x]."";
            mysqli_query($dbconn,$updateQ2) or die ("Error: " . mysqli_error($dbconn));

            $updateoid = "UPDATE `order_detail` SET `ORDER_DATE`=now(),`ORDER_ID`=".$arrayOrder[$x]." WHERE ORDER_DETAIL_ID = ".$arrayDetail[$x]."";
            mysqli_query($dbconn,$updateoid) or die ("Error: " . mysqli_error($dbconn));

            $od1 = "SELECT * FROM order_detail as od
               join menu as m on m.menu_id = od.menu_id 
               where od.order_id = ".$arrayOrder[$x]."";
            $orderd1 = mysqli_query($dbconn,$od1) or die ("Error: " . mysqli_error($dbconn));
            $detailrow1 = mysqli_num_rows($orderd1);


            while($detailrow1 > 0){
                if($detailrow1 = mysqli_fetch_assoc($orderd1)){
                        $arrayTotal[$count] = $detailrow1["total_quantity"]*$detailrow1["menu_price"];
                        $count++;
                }
            }

            $updateQ1 = "UPDATE `order_detail` SET `total_payment`=".$arrayTotal[$x]." WHERE ORDER_DETAIL_ID = ".$arrayDetail[$x]."";
            mysqli_query($dbconn,$updateQ1) or die ("Error: " . mysqli_error($dbconn));
            
            $payment = "INSERT INTO `payment`(`payment_amount`, `payment_status`, `customer_id`, `order_detail_id`) VALUES (".$_COOKIE['total'].",'0',".$latestid.",".$arrayDetail[$x].")";
            mysqli_query($dbconn,$payment) or die ("Error: " . mysqli_error($dbconn));
            
        }
            $_SESSION['arrayDetail'] = $arrayDetail;
        
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>;
                <script>Swal.fire({
                  title: "Do you want to proceed?",
                  html: "Your Orders will be immediately sent to vendor<br>Any changes that you have made needs to be informed",
                  icon: "info",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  cancelButtonText: "No Thanks, Send me to Main Page",
                  confirmButtonText: "Yes, Proceed with my orders"
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = "processdetail.php";
                  } else {
                    window.location.href = "customer.php";
                  }
                })</script>';
        }  else {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>;
                <script>Swal.fire({
                      icon: "error",
                      title: "Sorry...", 
                      html: "You need to wait for your first orders to complete before ordering a new ones",
                      confirmButtonText: "Back to Main Page"}).then((result) => {
                          if (result.isConfirmed) {
                            window.location.href = "customer.php";
                          } 
                        })</script>';
        }

?>
