<?php
session_start();
include("dbconn.php");

if( isset($_POST['add_product'] ) ) {

     $menu_id = $_POST['menu_id'];
     $menu_name = $_POST['menu_name'];
     $menu_price = $_POST['menu_price'];
     $menu_category = $_POST['menu_category'];
     $menu_image = $_FILES['menu_image']['name'];
     $vendor_id = $_POST['vendor_id'];
     $menu_image_tmp_name = $_FILES['menu_image']['tmp_name'];
     $menu_image_folder = 'Images/'.$menu_image;

     $insert_query = mysqli_query($dbconn, "INSERT INTO `menu`(menu_id, menu_name, menu_price, menu_category, menu_image , vendor_id) VALUES( '$menu_id', '$menu_name', '$menu_price', '$menu_category', '$menu_image',  '$vendor_id'  )") or die('query failed');

      if($insert_query){
      move_uploaded_file($menu_image_tmp_name, $menu_image_folder);
      $message[] = 'product add succesfully';
   }else{
      $message[] = 'could not add the product';
   }
};


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($dbconn, "DELETE FROM `menu` WHERE menu_id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:VendorEdit.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:VendorEdit.php');
      $message[] = 'product could not be deleted';
   };
};


if(isset($_POST['update_product'])){
   $update_menu_id = $_POST['update_menu_id'];
   $update_menu_name = $_POST['update_menu_name'];
   $update_menu_price = $_POST['update_menu_price'];
   $update_menu_category = $_POST['update_menu_category'];
   $update_menu_image = $_FILES['update_menu_image']['name'];  
   $update_vendor_id = $_POST['update_vendor_id'];  
   $update_menu_image_tmp_name = $_FILES['update_menu_image']['tmp_name'];
   $update_menu_image_folder = 'Images/'.$update_menu_image;

   $update_query = mysqli_query($dbconn, "UPDATE `menu` SET menu_name = '$update_menu_name', menu_price = '$update_menu_price', menu_category = '$update_menu_category', vendor_id = '$update_vendor_id', menu_image = '$update_menu_image' WHERE menu_id = '$update_menu_id'");

   if($update_query){
      move_uploaded_file($update_menu_image_tmp_name, $update_menu_image_folder);
      $message[] = 'product updated succesfully';
      header('location:VendorEdit.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:VendorEdit.php');
   }

}

?>

<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <title>List Menu</title>
        
        <link rel="stylesheet" type="text/css" href="./css/vendor.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
    </head>
    
    
<body>
   <section class="header">
       
        <nav>
            <a href="VendorHome.php"><img class="borderlogo" src="Images/uitmgologo.png"></a>
            <div class="nav-links">
                <ul>
                     <li><a href="VendorListMenu.php" >List Menu</a></li>
                    <li><a href="VendorEdit.php" >Edit</a></li>
                    <li><a href="VendorOrderInfo.php" >Order Info</a></li>
                    <li><a href="VendorSales.php" >Sales</a></li>
                    <li><a href="index.php">Log Out</a></li>
                </ul>
            </div>
       </nav> 
       
       
       <div class="hr1">
            <h1>List Menu</h1>
       </div>
       
     <?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>  

<div class="container">

 

<section class="display-product-table">

   <table>

      <thead>
         <th>menu ID</th>
         <th>menu Name </th>
         <th>menu Price</th>
         <th>menu Category</th>
         <th>menu image</th>
         <th>vendor ID</th>
         
      </thead>

      <tbody>
         <?php
         
            $sql="
            SELECT menu.menu_id, menu.menu_name, menu.menu_price, menu.menu_category, menu.menu_image, menu.vendor_id 
            FROM `menu`

	               inner join vendor ON
                   menu.vendor_id = vendor.vendor_id
                   where vendor.vendor_id = '".$_SESSION['vendorid']."';";
          
            $select_products = mysqli_query($dbconn, $sql) or die ("Error: ". mysqli_error());
          
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            
            <td><?php echo $row['menu_id']; ?></td>
            <td><?php echo $row['menu_name']; ?></td>
            <td>RM<?php echo $row['menu_price']; ?></td>
            <td><?php echo $row['menu_category']; ?></td>
            <td><img src="Images/<?php echo $row['menu_image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['vendor_id']; ?></td> 
             
           
             
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($dbconn, "SELECT * FROM `menu` WHERE menu_id = $edit_id");
       
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="Images/<?php echo $fetch_edit['menu_image']; ?>" height="200" alt="">
      <input type="hidden" name="update_menu_id" value="<?php echo $fetch_edit['menu_id']; ?>">
      <input type="text" class="box" required name="update_menu_name" value="<?php echo $fetch_edit['menu_name']; ?>">
      <input type="number" min="0" class="box" required name="update_menu_price" value="<?php echo $fetch_edit['menu_price']; ?>">
      <input type="text" class="box" required name="update_menu_category" value="<?php echo $fetch_edit['menu_category']; ?>">
      <input type="file" class="box" required name="update_menu_image" accept="image/png, image/jpg, image/jpeg">
      <input type="text" class="box" required name="update_vendor_id" value="<?php echo $fetch_edit['vendor_id']; ?>">
      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>
          
    </section>
    
</body>
</html>