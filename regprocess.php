
<html>
<head>
	<style>
			
	
	</style>
	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UiTMGO Official</title>
        <link rel="stylesheet" type="text/css" href="./css/admin2.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet"> 
		</head>
<body>
    
    
		<section class="header">
        <nav>
            <a href="index.html"><img class="borderlogo" src="Images/uitmgologo.png"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="./index.php" class="active">Login</a></li>
                    <li><a href="./about.html">About</a></li>
                    <li><a href="./contact.html">Contact</a></li>
                </ul>
            </div>
       </nav>
		
		 <div class="hr1">
            <h1>REGISTRATION DETAILS</h1>
       </div><br>
       <div class="fullborder">
        
            
<?php
/* include db connection file */
include("dbconn.php");

	
	$name = $_POST['name'];
    $address = $_POST['address'];
	$number = $_POST['number'];
	$password = $_POST['password'];
   
	
    
    

    
	
	$sql2 = "INSERT INTO customer ( customer_name, customer_num,customer_address, customer_password)
	VALUES ('" . $name . "', '" . $number . "', '" . $address . "', '" . $password . "')";
	mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));

	echo "Data has been saved";

/*

    $sql="SELECT customer_id FROM customer ORDER BY customer_ID DESC LIMIT 1";
	$query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
	$row = mysqli_num_rows($query);

    $sql3="SELECT customer_password FROM customer ORDER BY customer_ID DESC LIMIT 1";
	$query = mysqli_query($dbconn, $sql3) or die ("Error: " . mysqli_error());
	$row1 = mysqli_num_rows($query);
*/
    
    $sql="SELECT customer_id,customer_password FROM customer ORDER BY customer_ID DESC LIMIT 1";
	$query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
	$row = mysqli_num_rows($query);
	if($row == 1){
        
		echo"<table border=1>";
		echo"<tr>";
		echo"<th>Student ID</th>";
		echo"<th>Student Password</th>";
		echo"</tr>";
		while($row = mysqli_fetch_array($query)) {
		echo"<tr>";
		echo"<td>".$row["customer_id"]."</td>";
		echo"<td>".$row["customer_password"]."</td>";
		echo"</tr>";
		}
		echo"</table> <br>";
        
        echo "Click here to <a href='index.php'>to log in<a/>.";
        
		
	}
	else{
        
        echo "No record found";
		
		echo "Click here to <a href='index.php'>to log in<a/>.";
	}


    
    
?>
                        
                </div>
            </div>
    </body>
    </html>