<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UiTMGO Official</title>
        <link rel="stylesheet" type="text/css" href="./css/customerelse.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
        
        <style>
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
  <form method="post" action=""><br>
                        <h2 style="text-align: center;font-size:40px">Search your Desired Menu and View Latest Items</h2>
                      <div style="width:40%;margin-bottom:5%;margin-left:auto;margin-right:auto;display:block">
                      <input type="text" name="result" style="padding: 2%;width: 55%;text-align:center;float:left;margin-left:13%" placeholder="Enter Your Name" onkeydown="return /^(\w+\s?)*\s*$/i.test(event.key)">
                      <input type="button" name="submit" style="padding: 2%;width: 20%;text-align:center;float:left" value="Find">
                      </div>
                  </form>
           <?php 
                $dbconn= mysqli_connect("localhost", "root", "","uitmgo") or die(mysqli_error($dbconn));
                        if(!isset($_POST['result']) && empty($_POST['result'])){
                             $sql="SELECT * FROM MENU as m
                                inner join vendor as v on v.vendor_id = m.vendor_id 
                                WHERE v.vendor_id = ".rand(3001,3002)."
                                limit 10";
                        $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));                           
                        echo'<table>';
                                  echo'<tr>';
                                  echo'<th>Latest Menu</th>';
                                  echo'<th>Menu Price</th>';
                                  echo'<th>Nearest Vendor</th>';
                                  echo'<th></th>';
                                  echo'<th></th>';

                                  echo"</tr>";
                                  while($row = mysqli_fetch_array($query)) {
                                  echo"<tr>"; 
                                  echo'<td style="text-align:center;width:20%"><br><img src="Images/'.$row['menu_image'].'" style="width:50%"><br>'.$row["menu_name"].'</td>';
                                  echo'<td class="divided" >'.$row["menu_price"].'</td>';
                                  echo'<td class="divided" >'.$row["vendor_name"].'</td>';

                                   echo'<td><a href="customer.php"><button style="margin:4%;padding:2.5% 4%;">Check Status</button></a></td>';
                                  echo"</tr>";
                           }
                        } else {
                        $sql="SELECT * FROM MENU as m
                        inner join vendor as v on v.vendor_id = m.vendor_id WHERE (MENU_NAME LIKE '%".$_POST['result']."%') ";
                        $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));                           
                            
                        $row = mysqli_num_rows($query);
	                       if($row == 0){
                              echo'<table>';
		                      echo'<tr>';
		                      echo'<th>Searched Menu</th>';
		                      echo'<th>Menu Price</th>';
		                      echo'<th>Nearest Vendor</th>';
		                      echo'<th></th>';
		                      echo"</tr>";
                               
                              echo'<tr>';
                              echo'<td colspan=4 style="padding:2%">';
		                      echo "No record found";
                              echo'</td>';
                              echo'</tr>';
                              echo'</table>';
	                       } else{
		                      echo'<table>';
		                     echo'<tr>';
                              echo'<th>Searched Menu</th>';
		                      echo'<th>Menu Price</th>';
		                      echo'<th>Nearest Vendor</th>';
		                      echo'<th></th>';
		                      echo'<th></th>';
                               
		                      echo"</tr>";
		                      while($row = mysqli_fetch_array($query)) {
		                      echo"<tr>"; 
		                      echo'<td style="text-align:center;width:20%"><br><img src="Images/'.$row['menu_image'].'" style="width:50%"><br>'.$row["menu_name"].'</td>';
		                      echo'<td class="divided" >'.$row["menu_price"].'</td>';
		                      echo'<td class="divided" >'.$row["vendor_name"].'</td>';
                                  
                              echo'<td><a href="customer.php"><button style="margin:4%;padding:2.5% 4%;">Check Status</button></a></td>';
		                      echo"</tr>";
		                  }
		                      echo"</table>";
	                   }
                    }
                    echo '<br>';
                  ?>
        <br>
       </div>
    </section>
    
</body>
</html>