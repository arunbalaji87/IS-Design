<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<!--Begin Media Queries-->
  <head>
  <meta charset="UTF-8" name="viewport" content="initial-scale=1.0, width=device-width"/>
  <link rel="stylesheet" media='screen and (min-width: 0px) and (max-width: 568px)' href="phone.css"/>
  <link rel="stylesheet" media='screen and (min-width: 569px) and (max-width: 1024px)' href="tablet.css"/>
  <link rel="stylesheet" media='screen and (min-width: 1025px)' href="desktop.css"/>
  <title> DTC Dental Care </title>
 
  </head>
  <!--End Media Queries-->
  
  <body id="bgcolor" bgcolor="#1a2830">

  <div id="container">
  <div id="banner_container">
    <img id="banner" src='header_desktop.png' alt="site banner" usemap="#bannermap" />  
	<map name="bannermap">
	<area shape="rect" coords="0,0,385,385" href="default.php">
   </div>
  <!--Begin Navigation-->
<nav>
    <ul>
	<br>
    <li><a href="default.php">Home</a> </li>	
    <li><a href="services.php">Services</a></li>	
    <li><a href="account.php">My Account</a></li>
    <li class="lastnav"><a href="about.php">About Us</a></li>
    <div id="logout_button_desktop"><?php if(isset($_SESSION['AcctId'])){echo "<li class='logout_button'><a href='logout.php'>Log Out</a></li>";} ?></div>
	</ul>
	<div>
    <p id="contact"> 
	<strong>Contact Us</strong>
	<br>
	 Phone: 555-555-5555 
	<br>
		<strong>Hours: 8am to 5pm</strong>
     <br><br>
	 1111 Canal St. Colorado Springs, CO, 80923
		<br><br>
		<br><br>
		</p>
	 <a id="map" href="https://www.google.com/maps/place/Speedpro+Imaging+DTC/@39.6476735,-104.9971905,13z/data=!4m5!1m2!2m1!1sdtc+englewood!3m1!1s0x0:0xdec1363c9fc9374e" target="_blank">
	 <img src="map_desktop.png" alt="map to office" height="100" width="100"/> 
	 </a>
	    </div>
	</nav>
<!--END NAVIGATION-->
	
<!-- BEGIN CONTENT -->

<div class="content_container">


<div id="services_container_position">
		<p  class="content_header"> Services Offered </p>
<div class="services"> <img class="service_picture" src="rootcanal.jpg" alt="General Services"/>
			<p  class="service_subtext"> <span class= "bold">General Services</span><br><br>Root Canals<br>Routine Care<br>Fillings </p>
		</div>
<div class="services"> <img class="service_picture" src="orthodontics.jpg" alt="Special Services"/>
			<p  class="service_subtext"> <span class= "bold">Special Services</span><br><br>Orthodontics<br>Periodontics<br>Implants</p>
		</div>
<div class="services"> <img class="service_picture" src="whitening.jpg" alt="Cosmetic Services"/>
			<p  class="service_subtext"> <span class= "bold">Cosmetic Services</span> <br><br>Whitening<br>Bonding</p>
		</div>


</div>
<div id="footer_desktop">
	<center> Copyright INFO 621 Group 4 </center>
    </div>
</div>	
</div>

<!-- END CONTENT -->
	
<!--BEGIN MOBILE LOGOUT-->
	<div id="logout_button_mobile"><?php if(isset($_SESSION['AcctId'])){echo "<li class='logout_button'><a href='logout.php'>Log Out</a></li>";} ?></div> 
<!--END MOBILE LOGOUT-->	
<!--Begin Footer-->
	
	<div id="footer_mobile">
	<a id="map_mobile" href="www.google.com/maps/place/Speedpro+Imaging+DTC/@39.6476735,-104.9971905,13z/data=!4m5!1m2!2m1!1sdtc+englewood!3m1!1s0x0:0xdec1363c9fc9374e">
	 <img src="map_mobile.png" alt="map to office" height="50" width="50"/> 
	 </a>
	 <a id="email" href="mailto:care@dtcdental.com"> <img src="email_mobile.png" alt="email to office" height="50" width="50" />
	 </a>
	 <a id="phone" href="tel://1-555-555-5555"> <img src="phone_mobile.png" alt="phone to office" height="50" width="50" />
	 </a>
	</div>
<!--End Footer-->

	</div>
	</body>
	</html>
