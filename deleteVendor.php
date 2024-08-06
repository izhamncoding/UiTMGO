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
                    <?php           
                    include("dbconn.php");

                        $vendor_id = $_REQUEST['vnumber'];
                        
                        $sql01 = "SELECT * FROM vendor WHERE vendor_id= $vendor_id";
                        
                        $query01 = mysqli_query($dbconn, $sql01) or die ("Error: " . mysqli_error($dbconn));
                        $row01 = mysqli_num_rows($query01);
                        if($row01 == 0){
                        echo "Record is not existed";
                        }
                        else{
                            $sql2 = "DELETE FROM orders WHERE vendor_id= $vendor_id";
                            mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
                            
                            $sql3 = "DELETE FROM rider WHERE vendor_id= $vendor_id";
                            mysqli_query($dbconn, $sql3) or die ("Error: " . mysqli_error($dbconn));
                            
                            $sql4 = "DELETE FROM order_detail WHERE vendor_id= $vendor_id";
                            mysqli_query($dbconn, $sql4) or die ("Error: " . mysqli_error($dbconn));
                            
                            $sql5 = "DELETE FROM menu WHERE vendor_id= $vendor_id";
                            mysqli_query($dbconn, $sql5) or die ("Error: " . mysqli_error($dbconn));
                            
                            $sql5 = "DELETE FROM vendor WHERE vendor_id= $vendor_id";
                            mysqli_query($dbconn, $sql5) or die ("Error: " . mysqli_error($dbconn));
                            
                            
                            echo "Data for vendor has been deleted <br>";
                            echo"<a href='editadmin.php'>Main page</a>";
                        }
                        mysqli_close($dbconn);
                    ?>
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




