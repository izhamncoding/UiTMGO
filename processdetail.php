<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UiTMGO Official</title>
        <link rel="stylesheet" type="text/css" href="./css/customerelse.css">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
        
        <style>
            
        .extra {
            margin: 2%;      
        }  
          
        th{
            text-align: center;
            background-color: #C1C1C1;
            padding: 1%;    
        }
        
        tr{
            text-align: center; 
        }
        

        table {
            width: 90%;
            font-size: 15px;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid #ddd;
            text-align: center;
            border-collapse: collapse;
            box-shadow: 2px 1px 12px 2px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(odd) {
            background-color: white;
        }

        tr:hover {
            background-color: #ddd;
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
            <a href="customer.php"><img class="borderlogo" src="Images/uitmgologo.png"></a>
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
           <form method="post" action="">
                        <h2 style="text-align: center;font-size:40px">Search your Orders</h2>
                      <div style="width:40%;margin-bottom:5%;margin-left:auto;margin-right:auto;display:block">
                      <input type="text" name="result" style="padding: 2%;width: 55%;text-align:center;float:left;margin-left:13%" placeholder="Enter Your Name" onkeydown="return /^(\w+\s?)*\s*$/i.test(event.key)">
                      <input type="button" name="submit" style="padding: 2%;width: 20%;text-align:center;float:left" value="Find">
                      </div>
                  </form>
           <?php 
                $dbconn= mysqli_connect("localhost", "root", "","uitmgo") or die(mysqli_error($dbconn));
                        if(!isset($_POST['result']) && empty($_POST['result'])){
                             echo'<table>';
		                      echo'<th>ID</th>';
		                      echo'<th>Address</th>';
		                      echo'<th>Rider Name</th>';
		                      echo'<th>Source of Vendor</th>';
		                      echo'<th></th>';
		                      echo"</tr>";
                               
                              echo'<tr>';
                              echo'<td colspan=6 style="padding:2%">';
		                      echo "No record found";
                              echo'</td>';
                              echo'</tr>';
                              echo'</table>';
                        } else {
                            
                        $sql="SELECT * FROM CUSTOMER AS C 
                                JOIN order_detail AS OD ON OD.customer_id = C.customer_id
                                JOIN RIDER AS R ON R.rider_id = OD.rider_id
                                JOIN VENDOR AS V ON V.vendor_id = OD.vendor_id
                                WHERE (CUSTOMER_NAME LIKE '%".$_POST['result']."%') && ORDER_STATUS = 0
                                GROUP BY OD.vendor_id";
                        $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
                            
                        $row = mysqli_num_rows($query);
	                       if($row == 0){
                              echo'<table>';
		                      echo'<tr>';
		                      echo'<th>ID</th>';
		                      echo'<th>Address</th>';
		                      echo'<th>Rider Name</th>';
		                      echo'<th>Source of Vendor</th>';
		                      echo'<th></th>';
		                      echo"</tr>";
                               
                              echo'<tr>';
                              echo'<td colspan=11 style="padding:2%">';
		                      echo "No record found";
                              echo'</td>';
                              echo'</tr>';
                              echo'</table>';
	                       } else{
		                      echo'<table>';
		                     echo'<tr>';
		                      echo'<th>ID</th>';
		                      echo'<th>Address</th>';
		                      echo'<th>Rider Name</th>';
		                      echo'<th>Source of Vendor</th>';
		                      echo'<th></th>';
                               
		                      echo"</tr>";
		                      while($row = mysqli_fetch_array($query)) {
		                      echo"<tr>"; 
		                      echo'<td style="text-align:center">'.$row["customer_id"].'</td>';
		                      echo'<td class="divided" >'.$row["customer_address"].'</td>';
		                      echo'<td class="divided" >'.$row["rider_name"].'</td>';
		                      echo'<td class="divided" >'.$row["vendor_name"].'</td>';
                                  
                              echo'<td><a href="Check.php"><button class="button button-white button-sm extra" id="'.$row["customer_id"].'" value="'.$row["vendor_id"].'" style="padding:2.5% 4%" onclick="storeID(this)">Check Status</button></a></td>';
		                      echo"</tr>";
		                  }
		                      echo"</table>";
	                   }
                    }
                  ?>
           <br>
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