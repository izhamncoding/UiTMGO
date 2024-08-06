<?php
    session_start();
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

                    <li><a href="revenuestatisticadmin.php" >Revenue Statistic</a></li>
                    <li><a href="index.php" >Log Out</a></li>
                   


                </ul>

            </div>
        </nav> 
       <div class="hr1">
            <h1>Welcome</h1>
       </div><br>
       <div class="fullborder">
        <div class="text-box">
                <p>Admin Name<br>
                        <?php
                            echo  $_SESSION['username'];
                        ?></p>
        </div>
                <br><br>
                <div class="borderchocolate">
                    <p>Total Customer: 
                    <?php
                          $customer_query= "Select * from customer";
                          $customer_query_run= mysqli_query($dbconn, $customer_query);

                          if($customer_total= mysqli_num_rows($customer_query_run))
                          {
                            echo "$customer_total";
                          }
                          else
                          {
                            echo 'No Data';
                          }
                     ?>
                    </p>
                    <p>Total Rider: 
                    <?php
                          $rider_query= "Select * from rider";
                          $rider_query_run= mysqli_query($dbconn, $rider_query);

                          if($rider_total= mysqli_num_rows($rider_query_run))
                          {
                            echo "$rider_total";
                          }
                          else
                          {
                            echo 'No Data';
                          }
                     ?>
                    </p>
                    <p>Total Vendor: 
                    <?php
                          $vendor_query= "Select * from vendor";
                          $vendor_query_run= mysqli_query($dbconn, $vendor_query);

                          if($vendor_total= mysqli_num_rows($vendor_query_run))
                          {
                            echo "$vendor_total";
                          }
                          else
                          {
                            echo 'No Data';
                          }
                     ?>
                    </p>
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