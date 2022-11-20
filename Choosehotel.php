<?php 
session_start();

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['checkIn']) && isset($_POST['checkOut']) && isset($_POST['hotels']))
     {
         $_SESSION['name_s'] = $_POST['name'];
         $_SESSION['surname_s'] = $_POST['surname'];
         $_SESSION['email_s'] = $_POST['email'];
         $_SESSION['checkIn_s'] = strtotime($_POST['checkIn']);
         $_SESSION['checkOut_s'] = strtotime($_POST['checkOut']);
         $_SESSION['hotels'] = $_POST['hotels'];
         $_SESSION['cost'];
		 $_SESSION['month'];
		 $_SESSION['day'];
		 $_SESSION['year'];
         header('Location: functions.php'); 
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="hotels.css">
<style>

</style>
<body>
	<div class="container">

		<h1><center><a href="">COMPARE PRICES</a></center></h1>
	<nav class="navbar navbar-expand-lg bg-dark">
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="nav navbar-nav">
			<li class="nav-item"><a href="hotels.php" class="nav-link">Home</a></li>
			<li class="nav-item"><a href="Choosehotel.php" class="nav-link">Compare Hotels</a></li>
			<li class="nav-item"><a href="contactUs.html" class="nav-link">Contact</a></li>
		</ul>
	</div>
		<ul class="nav navbar-nav ml-auto">
                    <li><a href="http://www.facebook.com"><img src="img/facebook.png"></a></li>
                    <li><a href="http://www.twitter.com"><img src="img/twitter.png"></a></li>                    
                </ul>
	</nav>
</div>
    
    <body>
        

        
   <div >
        
         <div class="form">
             <div class="form-label">
         
         <form class="form" action="Choosehotel.php" method="POST" autocomplete="off" onsubmit="return validate(this)">
             <div class="form">
                <label for="name">First Name: </label><br>
				<input type="text" name="name" placeholder="Enter Name:" class="text">	
             </div>
             <div class="form">
                <label for="surname">Surname:</label><br>
                <input type="text" name="surname" placeholder="Enter Surname" class="text">
             </div>
			 <div class="form">
                <label for="email">Email:</label><br>
                <input type="text" name="email" placeholder="Email: example@gmail.com" class="text">
             </div>
			 
             <div class="form">
                <label for="">CheckIn Date:</label><br>
				<input type="date" name="checkIn">
             </div>
             <div class="form">
                 <label>CheckOut Date:</label><br>
				 <input type="date" name="checkOut">
             </div>
             <div class="table">
                <table class="table">
				<tr><th ><center>Compare Prices</center></th><tr>
				<tr><td><img src="img/Radisson_blu_Sandton_Pool.jpg" width="100px" height="100px"></td><td>Radison Blu Sandton</td><td><input type="checkbox" name="hotels[]" value="Radison Blu Sandton"></td></tr>
				<tr><td><img src="img/background.jpg" width="100px" height="100px"></td><td>Houghton Hotel</td><td><input type="checkbox" name="hotels[]" value="Houghton Hotel"></td></tr>
				<tr><td><img src="img/4.jpg" width="100px" height="100px"></td><td>The Hilton Hotel</td><td><input type="checkbox" name="hotels[]" value="The Hilton Hotel"></td></tr>
				
				
				</table>
             </div><br>
             <div class="form">
                 <input type="submit" value="Compare">
             </div>
         </form>
     </div>
        </div>
        </div>
        <br>

    </body>
</html>