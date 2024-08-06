 <?php
session_start();
header("Set-Cookie: name=value; HttpOnly");
include("dbconn.php");
if(isset($_POST["Submit"])){
	$username = mysqli_real_escape_string($dbconn,$_POST['username']);
	$password = mysqli_real_escape_string($dbconn,$_POST['password']);
    
    $sql= "Select * FROM admin_go Where admin_id= '$username' AND admin_password = '$password'";
    $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
    $row = mysqli_num_rows($query);
    
	if($row == 1 ) {
        $r = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $r['admin_name'];
        header("Location: ./admin.php");
	} 
        else{
		
        $sql= "Select * FROM customer Where customer_id= '$username' AND customer_password = '$password'";
        $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
        $row = mysqli_num_rows($query);
        
		      if($row == 1 ){
                  $r = mysqli_fetch_assoc($query);
                  $_SESSION['username'] = $r['customer_name'];
                  header("Location: customer.php");
                } 
                else {
                $sql= "Select * FROM rider Where rider_id= '$username' AND rider_password = '$password'";
                $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
                $row = mysqli_num_rows($query);
        
                    if($row == 1 ){
                    $r = mysqli_fetch_assoc($query);
                    $_SESSION['username'] = $r['rider_name'];
                    $_SESSION['userid'] = $r['rider_id'];
                    header("Location: rider.php");
                    } 
                    else{
                    $sql= "Select * FROM vendor Where vendor_id= '$username' AND vendor_password = '$password'";
                    $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error($dbconn));
                    $row = mysqli_num_rows($query);
                
                        if($row == 1 ){
                            $r = mysqli_fetch_assoc($query);
                            $_SESSION['username'] = $r['vendor_name'];
                            $_SESSION['vendorid'] = $r['vendor_id'];
                            header("Location: VendorHome.php");
                        }
                        
                            else{
                                echo "Invalid Username or Password. Click here to <a href='index.php'>Try Again<a/>.";
                            }
            
                }
    
            }
	
        }
}

mysqli_close($dbconn);






?>
