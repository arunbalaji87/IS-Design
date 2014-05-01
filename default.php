<?php
	session_start();
?>

<!DOCTYPE html lang=en>

<html lang=en>

<!--Begin Media Queries-->
  <head>
  <meta charset="UTF-8" name="viewport" content="initial-scale=1.0, width=device-width"/>
  <link rel="stylesheet" media='screen and (min-width: 0px) and (max-width: 568px)' href="phone.css"/>
  <link rel="stylesheet" media='screen and (min-width: 569px) and (max-width: 1024px)' href="tablet.css"/>
  <link rel="stylesheet" media='screen and (min-width: 1025px)' href="desktop.css"/>
  <title> DTC Dental Care 
  </title>
  </head>
  <!--End Media Queries-->
  
  <!--Begin Content-->
  
 <body id="page_color">
  

  <div id="container">
  <div id="banner_container">
	<img id="banner" src='header_desktop.png' alt="site banner" usemap="#bannermap" />  
	<map name="bannermap">
	<area shape="rect" coords="0,0,385,385" alt="area clickable" href="default.php">
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
	
<!--BEGIN BODY-->
<div class="content_container">
<div id="desktop_image">
<img src="main_image.png" alt="main image" width="88%"/>
</div>	
	<p id="mobile_intro">
	Welcome to DTC Dental, we are here to serve all of your dental care needs!</p>
	

	<!--BEGIN SIGNUP-->
	<?php if(!isset($_SESSION['AcctId'])){ 
	echo '<div id="signup">';
	echo '<a class="fill-div" href="login.php"> Signup / Login</a>';
	echo '</div>';
	} ?>
	
	<!--New Benefits-->
	<div id="whysign" >
<BR>
	<h2 class="benifitheading" >Creating a DTC account will allow you to:</h2>
	<br>
	<ul class="benefit_list">
			<li>Manage dental needs of your family through a single account</li>
			<li>View and schedule appointments with the dentist of your choice</li>
			<li>Keep track of your upcoming appointment</li>
			<li>Add additional members to your account</li>
			</ul>
	
</div>	
<!--New Benefits END-->
	
<!--BEGIN BENEFIT IMAGES-->
	<div id="wrapper">
    <div class="desktop_images" id="dentist_1" >
	<img src="dentist_1.jpg" alt="dentist image" height="100%" width="100%" /> </div>
    <div class="desktop_images" id="dentist_2">
	<img src="dentist_2.jpg" alt="dentist image" height="106%" width="100%" /></div>
	<div class="desktop_images" id="dentist_3">
	<img src="dentist_3.jpg" alt="dentist image" height="106%" width="100%" /></div>
	</div>
<!--END BENEFIT IMAGES-->

<!--BEGIN BENEFIT TEXT-->
	<div class="subtext">
	<div class="desktop_subtext" id="dentist_1"> Knowledgeable Staff </div>
	
    <div class="desktop_subtext" id="dentist_2"> Professional Service </div>
	
	<div class="desktop_subtext" id="dentist_3"> Excellent Results </div>
	</div>
	<br>
	

	
<!--END BENEFIT TEXT-->
</br></br>
<!--<p id="why_signup">
 Create an account and visit the My Account page to schedule/manage your appointments and view your account balance!
</p>
	
<!--BEGIN FOOTER-->
	<div id="footer_desktop">
	<center> Copyright INFO 621 Group 4 </center>
    </div>
	<!--BEGIN MOBILE LOGOUT-->
	<div id="logout_button_mobile"><?php if(isset($_SESSION['AcctId'])){echo "<li class='logout_button'><a href='logout.php'>Log Out</a></li>";} ?></div> 
<!--END MOBILE LOGOUT-->
	<div id="footer_mobile">
	<a id="map_mobile" href="https://www.google.com/maps/place/Speedpro+Imaging+DTC/@39.6476735,-104.9971905,13z/data=!4m5!1m2!2m1!1sdtc+englewood!3m1!1s0x0:0xdec1363c9fc9374e">
	 <img src="map_mobile.png" alt="map to office" height="50" width="50"/> 
	 </a>
	 <a id="email" href="mailto:care@dtcdental.com"> <img src="email_mobile.png" alt="email to office" height="50" width="50" />
	 </a>
	 <a id="phone" href="tel://1-555-555-5555"> <img src="phone_mobile.png" alt="phone to office" height="50" width="50" />
	 </a>
	</div>
<!--END FOOTER-->
	</div>
	</div>
	</body>
<!--END BODY-->
	</html>
