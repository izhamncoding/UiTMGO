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
                        /* include db connection file*/
                        include("dbconn.php");
                        /* capture vendor number */
                        $vendor_id = $_POST['vendor_id'];
                        /* execute SQL statement */
                        $sql= "SELECT * FROM vendor 
                        WHERE vendor_id= $vendor_id";
                        $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
                        $row = mysqli_num_rows($query);
                        if($row == 0){
                            echo "No record found";
                            }
                        else{
                            $r = mysqli_fetch_assoc($query);
                            $vendor_id= $r['vendor_id'];
                            $vendor_name= $r['vendor_name'];
                            $vendor_num= $r['vendor_num'];
                            $vendor_register= $r['vendor_register'];
                            $vendor_password= $r['vendor_password'];
                            ?>
                        <form name="form" method="post" action="process3.php">
                                ID: <input type="text" name="vendor_id" value="<?php echo $vendor_id; ?>"><br>
                                Vendor Name: <input type="text" name="vendor_name" value="<?php echo $vendor_name; ?>"><br>
                                Vendor Number: <input type="text" name= "vendor_num" value="<?php echo $vendor_num; ?>"><br>
                                Vendor Register: <input type="text" name= "vendor_register" value="<?php echo $vendor_register; ?>"><br>
                                Password: <input type="password" name= "vendor_password" value="<?php echo $vendor_password; ?>"><br>
                                <input type="submit" name="Update" value="Update">
                                <input type="submit" name="Delete" value="Delete">
                        </form>
                    <a href='vendorsearch.php'>Back</a>
                    <?php
                    }
                    mysqli_close($dbconn)
                    ;?>
                    
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


