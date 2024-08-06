
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
               <form name="form" method="post" action="insertion.php">
                    Add new admin<br>
                    Admin ID: <input type="text" name="id"><br>
                    Name: <input type="text" name="name"><br>
                    Phone Number: <input type="text" name="num"><br>
                    Password: <input type="password" name="password"><br>
                    <input type="submit" name="submit" value="submit">
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