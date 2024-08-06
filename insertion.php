<?php
/* include db connection file */
include("dbconn.php");

	$id = $_POST['id'];
	$name = $_POST['name'];
	$num = $_POST['num'];
	$password = $_POST['password'];
	
	$sql2 = "INSERT INTO admin_go(admin_id, admin_name, admin_num, admin_password)
	VALUES ('" . $id . "', '" . $name . "', '" . $num . "', '" . $password . "')";
	mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
	/* display a message */
	echo "Data has been saved";
?>