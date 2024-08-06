<?php
    session_start();
    $_SESSION["vendor"] = 3002;                                                                                                                             
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UiTMGO Official</title>
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Koulen&display=swap">
    <script>
        document.getElementsByTagName("html")[0].className += " js";

    </script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <section class="header">
        <nav>
            <a href="index.html">
                <img class="borderlogo" src="Images/uitmgologo.png" width="450">
            </a>

            <div class="nav-links">
                <ul>
                    <li><a href="browse.php">Browse</a></li>
                    <li><a href="processdetail.php">Process Details</a></li>
                    <li><a href="addcart.php">Cart</a></li>
                    <select class="dropbtn" onchange="checkVendor(this)" id="vendor">
                        <option value="2">Restaurant Pak Abu</option>
                        <option style="width:5%" value="1">Kedai Mek Kelate</option>
                    </select>
                    <li><a href="index.php">Log Out</a></li>
            </ul>
            </div>
        </nav>

        <div class="box">
            <h2 style="margin-left: auto;margin-right: auto;display: block;width: 50%;text-align: center;font-size: 170%">Restaurant Pak Abu<br>Feature Menu</h2>
            <hr style="border: 2px solid black">
            <div>
                <table style="padding: 1.0% 4.0%;width: 90%">
                    <tr>
                        <?php
                        $dbconn = mysqli_connect("localhost", "root", "","uitmgo") or die(mysqli_error($dbconn));
                        $sql = "SELECT * FROM MENU WHERE SUBSTR(MENU_ID,1,2) = SUBSTR('7100', 1, 2) && MENU_CATEGORY = 'FEATURE MENU'";
                        
                        $r = mysqli_query($dbconn,$sql);
                        
                        if(mysqli_num_rows($r) > 0){
                            for($i = 0; $i < 2;$i++){
                                echo "<tr>";
                            for($x = 0; $x <= 4;$x++){
                            while ($row = mysqli_fetch_assoc($r)){
                                $name = $row["menu_name"];
                                $price = $row["menu_price"];
                                $vendor = $row["vendor_id"];
                                $menu = $row["menu_id"];
                                $image = $row["menu_image"];
                                
                            echo '<td style="padding: 1% 0.4%">
                            <div class="interact" style="box-shadow: 1px 2px 15px 3px;overflow: hidden"> 
                                <img class="interact" src="Images/'.$image.'" width="250px">
                                <div style="background-color: white;width: 100%;" id ="'.$menu.'" onclick="addProduct(this)" data-price="'.$price.'" class="button button-primary js-cd-add-to-cart" href="#1" data-price="5.00">
                                    <h3 style="text-align: center;font-size: 40.5%;padding: 4%">'.$name.'</h3>
                                    <p style="text-align: center;line-height: 5px;padding: 0px 20px;padding-bottom: 10px;font-size: 14px" id="'.$image.'">RM '.$price.'</p>

                                    <button class="order text-order" style="text-align: center;padding: 10px 0px;margin-left: auto;margin-right: auto;display: block;width: 100%;margin-top: 2.5%;border:0px solid;font-size: 40.5%">Add to Cart</button>
                                </div>
                            </div>
                        </td>';
                                break;
                            }  
                        }       
                                echo "</tr>";
                            }
                        }
                        ?>
                </table>
            </div>

                <h2 style="margin-left: auto;margin-right: auto;display: block;width: 50%;text-align: center;font-size: 170%">Drinks</h2>
                <hr style="border: 2px solid black">

                    <table style="padding: 1.0% 4.0%;width: 90%">
                    <tr>
                        <?php
                        $dbconn = mysqli_connect("localhost", "root", "","uitmgo") or die(mysqli_error($dbconn));
                        $sql = "SELECT * FROM MENU WHERE SUBSTR(MENU_ID,1,2) = SUBSTR('7100', 1, 2) && MENU_CATEGORY = 'Drinks'";
                        
                        $r = mysqli_query($dbconn,$sql);
                        
                       if(mysqli_num_rows($r) > 0){
                            for($i = 0; $i < 2;$i++){
                                echo "<tr>";
                            for($x = 0; $x <= 4;$x++){
                            while ($row = mysqli_fetch_assoc($r)){
                                $name = $row["menu_name"];
                                $price = $row["menu_price"];
                                $vendor = $row["vendor_id"];
                                $menu = $row["menu_id"];
                                $image = $row["menu_image"];
                                
                            echo '<td style="padding: 1% 0.4%">
                            <div class="interact" style="box-shadow: 1px 2px 15px 3px;overflow: hidden"> 
                                <img class="interact" src="Images/'.$image.'" width="250px">
                                <div style="background-color: white;width: 100%;" id ="'.$menu.'" onclick="addProduct(this)" data-price="'.$price.'" class="button button-primary js-cd-add-to-cart" href="#1" data-price="5.00">
                                    <h3 style="text-align: center;font-size: 40.5%;padding: 4%">'.$name.'</h3>
                                    <p style="text-align: center;line-height: 5px;padding: 0px 20px;padding-bottom: 10px;font-size: 14px" id="'.$image.'">RM '.$price.'</p>

                                    <button class="order text-order" style="text-align: center;padding: 10px 0px;margin-left: auto;margin-right: auto;display: block;width: 100%;margin-top: 2.5%;border:0px solid;font-size: 40.5%">Add to Cart</button>
                                </div>
                            </div>
                        </td>';
                                break;
                            }  
                        }       
                                echo "</tr>";
                            }
                        }
                        ?>
                </table>
               
                <br>

                <div style="margin-right: auto;margin-left: auto;display: block;width: 85%;margin-top: 2.0%;background-color: white;padding: 2% 7%;">
                    <div style="margin-right: auto;margin-left: auto;display: block;width: 60%;background-color: #FFB000;padding: 0% 28.2%;font-size: 70%;float: right;margin-right: -8.2%">
                        <img src="Images/Warning.png" width="100px" style="float: left;padding: 2% 0%">
                        <img src="Images/Warning.png" width="100px" style="float: right;padding: 2% 0%">
                        <h3 style="color: black;text-align;padding: 5% 40%">Attention!!</h3>
                    </div>
                    <img src="Images/man%20bowing.webp" width="15%" st yle="padding: 0% 2%">
                    <img src="Images/woman bowing.webp" width="18%" style="padding: 2% 1%;float: right">
                    <div style="float: right;text-align: center;padding: 0% 3%">
                        <h2 style="font-size: 43.8%;padding: 15.5% 0%;color: black"> We are trying our best to expand our food selection so it may seems that there <br> is a little amount of food to choose from. Any inconvienince is heavily apologized</h2>
                    </div>
                    <div style="margin-right: auto;margin-left: auto;display: block;width: 60%;background-color: red;padding: 0% 28.2%;font-size: 35%;float: right;margin-right: -8.2%">
                        <h3 style="color: white;text-align: center;">Incoming Changes will feature new and more attractive local food near your home, Stay Tune For More Updates</h3>
                    </div>
                    <br>
            </div>

                    <h2 style="margin-left: auto;margin-right: auto;display: block;width: 50%;text-align: center;font-size: 170%">Desserts</h2>
                    <hr style="border: 2px solid black">

                    <table style="padding: 1.0% 6.5%">
                        <?php
                        $dbconn = mysqli_connect("localhost", "root", "","uitmgo") or die(mysqli_error($dbconn));
                        $sql = "SELECT * FROM MENU WHERE SUBSTR(MENU_ID,1,2) = SUBSTR('7100', 1, 2) && MENU_CATEGORY = 'Desserts'";
                        
                        $r = mysqli_query($dbconn,$sql);
                        
                        if(mysqli_num_rows($r) > 0){
                            for($i = 0; $i < 2;$i++){
                                echo "<tr>";
                            for($x = 0; $x <= 4;$x++){
                            while ($row = mysqli_fetch_assoc($r)){
                                $name = $row["menu_name"];
                                $price = $row["menu_price"];
                                $vendor = $row["vendor_id"];
                                $menu = $row["menu_id"];
                                $image = $row["menu_image"];
                                
                            echo '<td style="padding: 1% 0.4%">
                            <div class="interact" style="box-shadow: 1px 2px 15px 3px;overflow: hidden"> 
                                <img class="interact" src="Images/'.$image.'" width="250px">
                                <div style="background-color: white;width: 100%;" id ="'.$menu.'" onclick="addProduct(this)" data-price="'.$price.'" class="button button-primary js-cd-add-to-cart" href="#1" data-price="5.00">
                                    <h3 style="text-align: center;font-size: 40.5%;padding: 4%">'.$name.'</h3>
                                    <p style="text-align: center;line-height: 5px;padding: 0px 20px;padding-bottom: 10px;font-size: 14px" id="'.$image.'">RM '.$price.'</p>

                                    <button class="order text-order" style="text-align: center;padding: 10px 0px;margin-left: auto;margin-right: auto;display: block;width: 100%;margin-top: 2.5%;border:0px solid;font-size: 40.5%">Add to Cart</button>
                                </div>
                            </div>
                        </td>';
                                break;
                            }  
                        }       
                                echo "</tr>";
                            }
                        }
                        ?>
                    </table>
        </div>
                    
        <div class="cd-cart cd-cart--empty js-cd-cart">
            <a href="#0" class="cd-cart__trigger text-replace">
                Cart
                <ul class="cd-cart__count">
                    <!-- cart items count -->
                    <li>0</li>
                    <li>0</li>
                </ul> <!-- .cd-cart__count -->
            </a>

            <div class="cd-cart__content">
                <div class="cd-cart__layout">
                    <header class="cd-cart__header">
                        <h2>Cart</h2>
                        <span class="cd-cart__undo">Item removed. <a href="#0">Undo</a></span>
                    </header>

                    <div class="cd-cart__body">
                        <ul id="product">
                            <!-- products added to the cart will be inserted here using JavaScript -->
                        </ul>
                    </div>

                    <footer class="cd-cart__footer">
                        <a href="addcart.php" class="cd-cart__checkout" style="text-decoration: none" onclick="check()">
                            <p>Checkout - RM <span>0</span>
                            </p>
                        </a>
                    </footer>
                </div>
            </div> <!-- .cd-cart__content -->
        </div> <!-- cd-cart -->

    </section>
    
    <script>
        function checkVendor(target){
            if(document.getElementById("vendor").value == 1){
                window.location.href = "customer.php";
            } else if(document.getElementById("vendor").value == 2){
                window.location.href = "customer2.php";
            }
        }
    </script>
    <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
    <script src="assets/js/main.js"></script>
</body>

</html>
