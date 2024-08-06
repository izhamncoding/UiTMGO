

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
               <p style="font-size:25px; text-shadow: 2px 0 0 #000, 0 -1px 0 #000, 0 1px 0 #000, -1px 0 0 #000;">Rider List</p>
                <?php
                    include("dbconn.php");
                    $sql="select * from rider";
                    $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
                    $row = mysqli_num_rows($query);
                    if($row == 0){
                        echo "No record found";
                    }
                    else{
                        echo"<table border=1>";
                        echo"<tr>";
                        echo"<th>Rider ID</th>";
                        echo"<th>Rider Name</th>";
                        echo"<th>Rider Number</th>"; 
                        echo"<th>Rider Register</th>"; 
                        echo"<th>Rider Password</th>";
                        echo"<th>Delete</th>";
                        echo"</tr>";
                        while($row = mysqli_fetch_array($query)) {
                        echo"<tr>";
                        echo"<td>".$row["rider_id"]."</td>";
                        echo"<td>".$row["rider_name"]."</td>";
                        echo"<td>".$row["rider_num"]."</td>";
                        echo"<td>".$row["rider_register"]."</td>";
                        echo"<td>".$row["rider_password"]."</td>";
                        echo"<td><a href='deleteRider.php?rnumber=".$row["rider_id"]."'>Delete</a></td>";
                        echo"</tr>";
                        }
                        echo"</table>";
                    }

                ?>
           </div>
           <div class="borderchocolate">
                <form name="form" method="post" action="ridersearch.php">
                    <p>
                    Please Insert Rider ID To Proceed<br>
                    Rider ID: <input type="text" name="rider_id" value=""><br>
                    <input type="submit" name="Search" value="Search">
                    </p>
               </form>
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