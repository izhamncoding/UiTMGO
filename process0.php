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
            <a href="index.html"><img class="borderlogo" src="Images/uitmgologo.png"></a>
            
            <div class="navbar">
             
               
            </div>
            <div class="nav-links">
                <ul>
                    <li><div class="dropdown">
            
                      <button onclick="myFunction()" class="dropbtn">List & Edit</button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="editadmin.php">Admin</a> 
                        <a href="editcustomer.php">Customer</a>
                        <a href="editrider.php">Rider</a>
                        <a href="editvendor.php">Vendor</a>
                        
                      </div>
                        </div>
                   </li> 

                    <li><a href="revenue%20statistic.html"  >Revenue Statistic</a></li>
                    <li><a href="index.php"  >Log Out</a></li>
                   


                </ul>

            </div>
        </nav> 
       <div class="fullborder">
                <div class="case">
                    <?php
                        /* include db connection file */
                        include("dbconn.php");


                        if(isset($_POST['Update'])){
                            /* capture values from HTML form */

                            $id = $_POST['customer_id'];
                            $customer_id = $_POST['customer_id'];
                            $customer_name = $_POST['customer_name'];
                            $customer_num = $_POST['customer_num'];
                            $customer_address = $_POST['customer_address'];
                            $customer_password = $_POST['customer_password'];
                            $sql0 = "SELECT customer_id FROM customer WHERE customer_id= $customer_id";
                            $query0 = mysqli_query($dbconn, $sql0) or die ("Error: " . mysqli_error($dbconn));
                            $row0 = mysqli_num_rows($query0);
                            if($row0 == 0){
                            echo "Record is existed";
                            }
                            else{
                            /* execute SQL UPDATE command */
                            $sql2 = "UPDATE customer SET customer_id = '" . $customer_id . "',
                            customer_name= '" . $customer_name . "',
                            customer_num = '" . $customer_num . "', customer_address = '" . $customer_address . "', customer_password = '" . $customer_password . "' where customer_id = '" . $id . "'";

                            mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
                            /* display a message */
                            echo "Data has been updated <br>";
                            echo"<a href='admin.php'>Back to Admin page</a>";
                            }
                        }
                        elseif(isset($_POST['Delete'])){
                            echo "delete";

                            $id = $_POST['id'];

                            $sql0 = "SELECT *  FROM customer WHERE customer_id= $customer_id";

                            $query0 = mysqli_query($dbconn, $sql0) or die ("Error: " . mysqli_error($dbconn));
                            $row0 = mysqli_num_rows($query0);
                            if($row0 == 0){
                            echo "Record is not existed";
                            }
                            else{
                            /* execute SQL DELETE command */
                            $sql2 = "DELETE FROM student WHERE customer_id= $customer_id";

                            mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
                            /* display a message */
                            echo "Data has been deleted <br>";
                            echo"<a href='admin.php'>Back to Admin page</a>";
                            }
                        }

                        // close if isset()
                            /* close db connection */
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






