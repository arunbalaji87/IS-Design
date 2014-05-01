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
  
  <!--Begin Content-->
  
  <body id="bgcolor" bgcolor="#1a2830">
  

  <div id="container">
  <div id="banner_container">
    <img id="banner" src='header_desktop.png' alt="site header" usemap="#bannermap" />  
	<map name="bannermap">
  <area shape="rect" coords="0,0,385,385" href="default.php">
  
</map>
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
   
   <!--Begin doctor_info-->
   <div class="content_container">
   <p  class="content_header"> About Us </p>
   <img id="about_us_doctor" src="about_us_doctor.png" alt="Dr. Jeffery Hill"/>
		<div id="description_container">

   <p id="doctor_description">Dr. Jeffery Hill was born in Colorado Springs, Colorado and moved shortly after to Denver, Colorado where his father opened a dental practice. 
After graduating from Denver High School as Valedictorian, he attended University of Denver where he received his Bachelor of Arts in Spanish. 
He fell in love with the town and with his future wife Hannah Cyrus. He then received his Doctorate of Dental Surgery (DDS) at the University of Denver Medical School. 
He graduated Summa Cum Laude and was inducted into the Omicron Kappa Upsilon Honor Dental Society. He also received several prestigious awards including the 
Dr. Kenneth, L. Stewart Memorial Award for Excellence in Orthodontics and the Outstanding Achievement in Operative Dentistry Award. He has completed several continuing 
education courses including 109 hours involving implant dentistry. In his spare time he enjoys hunting, fishing, playing sports, and spending time with his wife and 
children, Madison, Jackson and Cameron.
</p>
		</div>
	
		<div id="team_container_position">
		<p  class="content_header"> Our Team </p>
<div class="team_member"> <img class="member_picture" src="team_member1.png" alt="Janet Reid"/>
			<p  class="team_subtext"> Janet Reid<br></p>
		</div>
<div class="team_member"> <img class="member_picture" src="team_member2.png" alt="Lori Lovette"/>
			<p  class="team_subtext"> Lori Lovette<br></p>
		</div>
<div class="team_member"> <img class="member_picture" src="team_member3.png" alt="Michael Chandler"/>
			<p  class="team_subtext"> Michael Chandler<br></p>
		</div>
<div class="team_member"> <img class="member_picture" src="team_member4.png" alt="Alton Watson"/>
			<p  class="team_subtext"> Alton Watson<br></p>
			</div>
</div>
<div id="footer_desktop">
	<center> Copyright INFO 621 Group 4 </center>
    </div>
			</div>
<!--End doctor_info-->
 <!--BEGIN MOBILE LOGOUT-->
	<div id="logout_button_mobile"><?php if(isset($_SESSION['AcctId'])){echo "<li class='logout_button'><a href='logout.php'>Log Out</a></li>";} ?></div> 
<!--END MOBILE LOGOUT-->
	
	
<!--Begin Footer-->
	
	<div id="footer_mobile">
	<a id="map_mobile" href="www.google.com/maps/place/Speedpro+Imaging+DTC/@39.6476735,-104.9971905,13z/data=!4m5!1m2!2m1!1sdtc+englewood!3m1!1s0x0:0xdec1363c9fc9374e">
	 <img src="map_mobile.png" alt="map to office" height="50" width="50" alt="Google map link"/> 
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
