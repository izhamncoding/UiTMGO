<html>
	<head>
	
	<style>
			
	
	</style>
	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UiTMGO Official</title>
        <link rel="stylesheet" type="text/css" href="./css/landingpage.css">
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
		
		<div class = "container">
            <br><br>
		
		<h1>LOG IN</h1>
		
			<form name="form" method = "post" action="loginphp.php">
				<div class = "tbox">
					<input type = "text" placeholder = "ID" value = "" name="username" id="username">
				</div>
				
				<div class = "tbox">
					<input type = "password" placeholder = "Password" value = "" name = "password" id="password">
				</div>
				
				<input class = "btn" type = "submit" name = "Submit" value = "login">
				
			</form>
			<a class="b1" onclick="fx1()">Forget Password?</a>
            
            <script>
        function fx1() {
          window.alert("Please visit the Contact page to contact the admin");
        }
        </script>
            
            <br>
			<a class = "b2" href= "regform.html"> Create An Account </a>
			
		</div>
		
		
        </section>
	</body>
</html>