<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UiTMGO Official</title>
    <link rel="stylesheet" type="text/css" href="./css/customerelse.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
    
    <style>
      .active:hover{
              background-color:  #41A451;
              color: white;
          }
      </style>
</head>

<body onload="displayCheckOut()">
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

        <div style="width: 80%;background: #FFFFFF;box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);border-radius: 6px;padding: 4% 0%;display: flex;flex-direction: column;margin-left: auto;margin-right: auto;">
            
            <!-- Title -->
            <div class="title">
                Shopping Bag
            </div>
            <form action="orders.php" method="POST" name="myForm" autocomplete="on" style="margin-left: auto;margin-right: auto;display: block;width: 50%;padding: 5% 0%">
                <div style="margin-left: auto;margin-right: auto;display: block;width: 100%;box-shadow: 1px 1px 15px 1px;float: left;border-radius: 6%;padding: 1%;margin: 1.5% 0.5%;">
                    <div style="padding: 10% 5%">
                        <p style="font-size: 35px;text-align: center;margin: 4% 0%">Your Cart Items</p>
                        <hr>

                        <code id="cart"></code>
                        <!--Customer Cart Items goes here-->
                        
                        <br>
                        <hr>
                        <div style="padding: 0% 10% 0% 15%">
                            <p name="total" style="float: left;font-size: 20px;margin:1% 0%" id="total">Total Price</p>
                            <!--Total Price of Cart goes here-->
                        </div>
                    </div>
                
                    <hr>
                    <table style="padding: 4%">
                        <tr>
                            <td>
                                <span>
                                    <input type="checkbox" style="width: 30px;height: 30px" required>
                                </span>
                            </td>
                            <td style="font-size: 15px;text-align: center;padding: 3%">
                                I agree to the Terms of Use and understand that my information will be used as described on this page and the UiTM GO Privacy Policy . If I choose to order here, my personal information will be automatically stored and secured for future payments.
                            </td>
                        </tr>
                    </table>
                    
                    <hr>
                    <table style="padding: 0.5%">
                        <tr>
                            <td style="font-size: 15px;padding: 3%">
                                <div style="text-align: center">
                                    <img src="Images/social_share_logo.png" width="220" style="margin-left: auto;margin-right: auto;display: block;width: 50%">
                                        <p>Every RM 0.20 of your purchase will save one patient's testicles<br>Save a Life! We can change it for a better cause</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <br>
                    <div style="margin-left: auto;margin-right: auto;display: block;width: 70.5%;">
                        <input class="active" type="submit" style="float: left;padding: 6% 13%;border: 0px solid;" value="Confirm Purchase" name="Confirm">

                        <a href="index.php"><button class="active" style="float: left;padding: 6% 13%;border: 0px solid;border-left: 2px solid white">Cancel Order</button></a>
                    </div>
                </div>
            </form>
        </div>

    </section>
      <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
      <script src="assets/js/main.js"></script>
</body>

</html>
