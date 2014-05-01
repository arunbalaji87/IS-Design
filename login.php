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
  <link rel="stylesheet" href="PickerStyle.css"/>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	</script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	
	$( "#radio1" ).click(function() {
	
		$('#radioradio1').prop('checked', true);
		$('#radioradio0').prop('checked', false);
		var elem = document.getElementById("newUsr");
		var elem2 = document.getElementById("exUsr");
		elem.style.display="block";
		elem2.style.display="none";
	});
	
	$( "#radio0" ).click(function() {
		
		$('#radioradio1').prop('checked', false);
		$('#radioradio0').prop('checked', true);
		var elem = document.getElementById("exUsr");
		var elem2 = document.getElementById("newUsr");
		elem.style.display="block";
		elem2.style.display="none";
	});
	//	Submit Button Click
	$( "#SubExistingUser" ).click(function() {
	
		// Create our XMLHttpRequest object
		var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "InsertUser.php";
		
		var firstVal  = document.getElementById("fname1").value;
		var lastVal  = document.getElementById("lname1").value;
		var dobVal  = document.getElementById("dob1").value;
		var userVal  = document.getElementById("usrname1").value;
		var pswdVal  = document.getElementById("pswd1").value;
		
		if(firstVal=='' || lastVal=='' || dobVal==''|| userVal==''|| pswdVal=='')
		{
			alert("Required fields are missing");
		}
		else{
				var flag = 0;
				name_regex = /^[a-zA-Z ]*$/;
				if(!name_regex.test(firstVal) || !name_regex.test(lastVal))
				{
					alert("Invalid characters in the name fields. (No special characters allowed)");
					
					flag =1;
				}
				
				username_regex = /^[a-zA-Z ]*$/;
				if(!username_regex.test(userVal))
				{
					alert("Invalid characters in the username field");		
					flag =1;
				}
				
				date_regex = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/;
				if(!date_regex.test(dobVal))
				{
					alert("Invalid characters in the date of birth field.(YYYY-MM-DD)");		
					flag =1;
				}
				
				if(flag !=1)
				{
					var vars = "Fname="+firstVal+"&Lname="+lastVal+"&Dob="+dobVal+"&User="+userVal+"&Pass="+pswdVal;
					
					hr.open("POST", url, true);
					// Set content type header information for sending url encoded variables in the request
					hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					// Access the onreadystatechange event for the XMLHttpRequest object
					hr.onreadystatechange = function() {
						if(hr.readyState == 4 && hr.status == 200) {
							var return_data = hr.responseText;
							document.getElementById("exUsr").innerHTML = return_data;
						}
					}
					// Send the data to PHP now... and wait for response to update the status div
					hr.send(vars); // Actually execute the request
					document.getElementById("exUsr").innerHTML = "<a href='#'><img src='searching.gif' border=0/></a>";
				}
				
		}
					
	});
	
	//	New User Submit Button Click
	$( "#SubNewUsr" ).click(function() {
		
		// Create our XMLHttpRequest object
		var hr = new XMLHttpRequest();
		// Create some variables we need to send to our PHP file
		var url = "InsertNewUser.php";
		
		var firstVal  = document.getElementById("fname").value;
		var midVal  = document.getElementById("mname").value;
		var lastVal  = document.getElementById("lname").value;
		var dobVal  = document.getElementById("dob").value;
		var telVal  = document.getElementById("tel").value;
		var userVal  = document.getElementById("usrname").value;
		var pswdVal  = document.getElementById("pswd").value;
		var pswdconfVal  = document.getElementById("pswdconf").value;
		
		if(firstVal=='' || lastVal=='' || dobVal==''|| telVal==''|| userVal==''|| pswdVal==''|| pswdconfVal=='')
		{
			alert("Required fields are missing");
		}
		else{
		
			var flag = 0;
				name_regex = /^[a-zA-Z ]*$/;
				if(!name_regex.test(firstVal) || !name_regex.test(lastVal)|| !name_regex.test(midVal))
				{
					alert("Invalid characters in the name fields (No special characters allowed)");
					
					flag =1;
				}
				
				username_regex = /^[a-zA-Z ]*$/;
				if(!username_regex.test(userVal))
				{
					alert("Invalid characters in the username field");		
					flag =1;
				}
				
				date_regex = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/;
				if(!date_regex.test(dobVal))
				{
					alert("Invalid characters in the date of birth field (YYYY-MM-DD)");		
					flag =1;
				}
				
				tel_regex = /^\([0-9]{3}\)[0-9]{3}-[0-9]{4}$/;
				if(!tel_regex.test(telVal))
				{
					alert("Invalid characters in the telephone field (XXX)XXX-XXXX");		
					flag =1;
				}
				
				if(flag !=1)
				{
			
					var vars = "Fname="+firstVal+"&Mname="+midVal+"&Lname="+lastVal+"&Dob="+dobVal+"&Tel="+telVal+"&User="+userVal+"&Pass="+pswdVal+"&PassConf="+pswdconfVal;
						
					hr.open("POST", url, true);
					// Set content type header information for sending url encoded variables in the request
					hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					// Access the onreadystatechange event for the XMLHttpRequest object
					hr.onreadystatechange = function() {
						if(hr.readyState == 4 && hr.status == 200) {
							var return_data = hr.responseText;
							document.getElementById("newUsr").innerHTML = return_data;
						}
					}
					// Send the data to PHP now... and wait for response to update the status div
					hr.send(vars); // Actually execute the request
					document.getElementById("newUsr").innerHTML = "<a href='#'><img src='searching.gif' border=0/></a>";
				}
		}	
	});
	
	
	});
	</script>
	
  <title> DTC Dental Care </title>
  
  </head>
<!--End Media Queries-->
  
<!--Begin Content-->
  
 
 <body id="page_color" bgcolor="#1a2830">
  

  <div id="container">
  <div id="banner_container">
   <img id="banner" src='header_desktop.png' />
   </div>
  <!--Begin Navigation-->
<nav>
    <ul>
	<br>
    <li><a href="default.php">Home</a> </li>	
    <li><a href="services.php">Services</a></li>	
    <li><a href="account.php">My Account</a></li>
	<li><a href="about.php">About Us</a></li>
	<?php if(isset($_SESSION['AcctId'])){echo "<li id='lastnav'><a href='logout.php'>Log Out</a></li>";} ?>
    
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

<!-- BEGIN RETURNING USER-->
   <div class="content_container">
	   <div  class= "content_header"> User Login </div>
	   <div>
		   <form id="login" style="padding-top:2em;" method="POST" action = "loginCheck.php">
				<input class="formText"  name="user1" type="text" placeholder=" User Name *" autofocus required/>   
				<input class="formText" name= "pass1" type="password" placeholder=" Password *" required/>
				<div style="padding-top:1em;padding-bottom:1em">
					<input type="submit" id="btnlogin" class="btn2" value="Log in" >
				</div>
			</form>	
				<div style="padding-top:2em;">
				<div style="padding-top:1em;" id="radio1"><input class = "" type="radio" name="radioUsr" id="radioradio1" value=1 /><label for="chkOldUser" style="color:#ffffff;">I am a  new customer.</label></div>
				<div style="padding-top:1em;" id="radio0"><input class = "" type="radio" name="radioUsr" id="radioradio0" value=0 /><label for="chkOldUser" style="color:#ffffff;">I am an existing DTC Dental customer.</label></div>
				</div>
			
		</div>	
		<div id="newUsr" style="display:none">
		<div class= "content_header"> New User Registration</div>
			<form id="new_users">
				<input class="formText" id="fname" type="text" placeholder=" First Name *" required/>
				<input class="formText" id="mname" type="text" placeholder=" Middle Name" required/>
				<input class="formText" id="lname"	type="text" placeholder=" Last Name *" required/>  
				<input class="formText" id="tel" type="text" placeholder=" Phone (XXX)XXX-XXXX *" required/>
				<input class="formText" id="dob" type="text" placeholder=" Date of Birth *" required/>   
				<input class="formText" id="usrname" type="text" placeholder=" Desired UserName *" required/>
				<input class="formText" id="pswd" type="password" placeholder=" Password *" required/>
				<input class="formText" id="pswdconf" type="password" placeholder=" Confirm Password *" required/>
				<div><input id="SubNewUsr" type="button" class="btn2" value="Create Account"></div>
				<div style="padding-top:1em;padding-bottom:1em;color:#ffffff;">You could alternatively call us at (555)-555-5555 or email us at care@dtcdental.net to create/complete your online Profile</div>
			</form>
		</div>
		<div id="exUsr" style="display:none">
		<div class= "content_header"> Existing User Registration</div>
				<form>
				<input class="formText" name="firstname" type="text" id="fname1" placeholder=" First Name *" required/>
				<input class="formText" name="lastname"	type="text" id="lname1" placeholder=" Last Name *" required/>  
				<input class="formText" name="ssn" type="text" id="dob1" placeholder=" Date of Birth (YYYY-MM-DD) *" required/>
				<input class="formText" name="username" type="text" id="usrname1" placeholder=" Desired User Name *" required/>
				<input class="formText" name="password"	type="password" id="pswd1" placeholder=" Desired Password *" required/>  
				<div><input id="SubExistingUser" type="button" class="btn2" style="width:auto" value="Create Online Account"></div/>
				<form>
		</div>
		<div id="footer_desktop">
		<center> Copyright INFO 621 Group 4 </center>
		</div>
	</div>
		
	</div>


<!--END RETURNING USER>

<!--BEGIN NEW USER--> 
<!--BEGIN FOOTER-->
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
	</body>
<!--END BODY-->
	</html>
