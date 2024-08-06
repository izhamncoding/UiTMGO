<?php
    session_start();
?>

<?php
    $dbconn= mysqli_connect("localhost", "root", "","uitmgo") or die(mysqli_error($dbconn));
    $oid = $_REQUEST['orderid'];

    echo $oid;
    $sql="UPDATE `order_detail` SET `order_status`= 1  WHERE customer_id = '".$oid."'";
    $query = mysqli_query($dbconn,$sql) or die ("Error: " . mysqli_error());

    if ($query = mysqli_query($dbconn,$sql)){
        header("Location: Rorderinfo.php");
    } else {
        echo "Error: " . $customer_details . ":-" . mysqli_error($dbconn); 
    }
?>