<?php
	session_start();
	if(!isset($_SESSION['AcctId'])) 
	{	
	 
	 header("Location: login.php");
	 die();	
	}
	else
	{
		$acctid=$_SESSION['AcctId'];
	}
?>

<!DOCTYPE html>
<html id="CatchPhp">
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
	
			//	Delete Reservation Button Click
			$( "#delAppt" ).click(function() {
				
				var ApptVal = $('input[name="radioAppt"]:checked').val();
				// Create our XMLHttpRequest object
				var hr = new XMLHttpRequest();
				// Create some variables we need to send to our PHP file
				var url = "DeleteAppt.php";
				
				var vars = "Appt="+ApptVal;
				hr.open("POST", url, true);
				// Set content type header information for sending url encoded variables in the request
				hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				// Access the onreadystatechange event for the XMLHttpRequest object
				hr.onreadystatechange = function() {
					if(hr.readyState == 4 && hr.status == 200) {
						var return_data = hr.responseText;
						document.getElementById("resId").innerHTML = return_data;
					}
				}
				// Send the data to PHP now... and wait for response to update the status div
				hr.send(vars); // Actually execute the request
				document.getElementById("resId").innerHTML = "<a href='#'><img src='searching.gif' alt='searching' border=0/></a>";
			
			});
			
	
			//	Submit Button Click
			$( "#subForm1" ).click(function() {
			
				if($("#btnID").attr("disabled") != "disabled")
				{		// Create our XMLHttpRequest object
						var hr = new XMLHttpRequest();
						// Create some variables we need to send to our PHP file
						var url = "PushData.php";
						var dateVal = $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
						var docVal  = document.getElementById("DocName").value;
						var patientVal  = document.getElementById("PatientName").value;
						var timeVal = $('input[name="radiog_lite"]:checked').val();
						var servVal  = document.getElementById("serviceId").value;
						var vars = "Date="+dateVal.val()+"&Doc="+docVal+"&Time="+timeVal+"&Patient="+patientVal+"&Service="+servVal;
						hr.open("POST", url, true);
						// Set content type header information for sending url encoded variables in the request
						hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						// Access the onreadystatechange event for the XMLHttpRequest object
						hr.onreadystatechange = function() {
							if(hr.readyState == 4 && hr.status == 200) {
								var return_data = hr.responseText;
								document.getElementById("timepicker").innerHTML = return_data;
							}
						}
						// Send the data to PHP now... and wait for response to update the status div
						hr.send(vars); // Actually execute the request
						document.getElementById("timepicker").innerHTML = "<a href='#'><img src='searching.gif' alt='searching' border=0/></a>";
				}					
			});
			
			
			//Change Dentist Names
			$( "#DocName" ).change(function() {
				
				
				var btnElem = document.getElementById("btnID");
				btnElem.setAttribute('class','btn1');
				$("#btnID").attr("disabled","disabled");
				$("#subForm1").attr("disabled","disabled");
			  
			  // Create our XMLHttpRequest object
					var hr = new XMLHttpRequest();
					// Create some variables we need to send to our PHP file
					var url = "CheckTime.php";
					var dateVal = $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
					var docVal  = document.getElementById("DocName").value;
					var vars = "Date="+dateVal.val()+"&Doc="+docVal;
					hr.open("POST", url, true);
					// Set content type header information for sending url encoded variables in the request
					hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					// Access the onreadystatechange event for the XMLHttpRequest object
					hr.onreadystatechange = function() {
						if(hr.readyState == 4 && hr.status == 200) {
							var return_data = hr.responseText;
							document.getElementById("buttoncontainmain").innerHTML = return_data;
						}
					}
					// Send the data to PHP now... and wait for response to update the status div
					hr.send(vars); // Actually execute the request
					document.getElementById("buttoncontainmain").innerHTML = "<a href='#'><img src='searching.gif' alt='searching' border=0/></a>";
			});
			
			//Change Date Selector
			$("#datepicker").datepicker({
				constrainInput: true,
				dateFormat: 'yy-mm-dd',
				onSelect: function (dateText, inst){
				
					var btnElem = document.getElementById("btnID");
					btnElem.setAttribute('class','btn1');
					$("#btnID").attr("disabled","disabled");
					$("#subForm1").attr("disabled","disabled");
			  
					// Create our XMLHttpRequest object
					var hr = new XMLHttpRequest();
					// Create some variables we need to send to our PHP file
					var url = "CheckTime.php";
					var dateVal = $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
					var docVal  = document.getElementById("DocName").value;
					var vars = "Date="+dateVal.val()+"&Doc="+docVal;
					hr.open("POST", url, true);
					// Set content type header information for sending url encoded variables in the request
					hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					// Access the onreadystatechange event for the XMLHttpRequest object
					hr.onreadystatechange = function() {
						if(hr.readyState == 4 && hr.status == 200) {
							var return_data = hr.responseText;
							document.getElementById("buttoncontainmain").innerHTML = return_data;
						}
					}
					// Send the data to PHP now... and wait for response to update the status div
					hr.send(vars); // Actually execute the request
					document.getElementById("buttoncontainmain").innerHTML = "<a href='#'><img src='searching.gif' alt='searching' border=0/></a>";
				}
				
			});
			$( "#datepicker" ).datepicker( "option", "maxDate", "2014-12-31" );
			$( "#datepicker" ).datepicker( "option", "minDate", "0d" );
			$('#datepicker').show();
			
	});
    var slidectrsch=0;
	var slidectracct=0;
	var slidectrman=0;
	var slidectrup=0;
	</script>
	
	
  
  </head>
  
 

<!---Connect to Time Data base-->
<?php
	
	if(!isset($_SESSION['AcctId'])) 
	{	
	 echo "User Not Logged In";	 
	 die();	
	}
	
	
	$datearray = getdate();
	$date = $datearray['year'].'-'.$datearray['mon'].'-'.$datearray['mday'];
	

		
	$link = mysql_connect("localhost", "dtcdenta_admin", "DTC_ADMIN");

		if (!$link) 
		{
			die('Could not connect: ' . mysql_error());
			
		}
		else
		{
			
			if(	$select_db = mysql_select_db('dtcdenta_DB', $link))
			{

			 
			$sql    = "SELECT * FROM DateAppointment where Date ='".$date."' and Dentist_ID =1";
			 
			 $result = mysql_query($sql,$link);
			
			while($row = mysql_fetch_array($result))
			  {
				 $arr = array(0,0,0,0,0,0,0,0,0);
				 $Userarr = array();
				 for ($i = 0; $i <=8; $i++)
				 {
					$Userarr[$i]= $row['Time'.$i];
					
					if($Userarr[$i]!=NULL)
					{
						$arr[$i] = 1;
					}
					else
					{
					    $arr[$i] = 0;
					}
				
				 }
								
				
			  }
			 
			}
				

		}

  for ($i = 0; $i <9; $i++)
	{
       if($arr[$i] == 1)
	   {
	     $arrradioclass[$i] = 'disabled class="css-checkboxred"';
		 $tdclass[$i] = 'class="tablered"';
	   }
	   else
	   {
		 $arrradioclass[$i] = 'class="css-checkbox"';
		 $tdclass[$i] = '';
	   }
	   
	}
	?>
	
	
	 <body id="bgcolor" bgcolor="#1a2830" onload="SetDateSel();">
	 
  <div id="container">
  
	 <!-- BEGIN BANNER-->
	 
  <div id="banner_container">
	<img id="banner" src='header_desktop.png' alt="site header" usemap="#bannermap" />  
	<map name="bannermap">
	<area shape="rect" coords="0,0,385,385" href="default.php">
   </div>
   <!-- End BANNER-->
   
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
	<div class="content_container">
    <div class="divcontent">
	   
     


	
	<button  class="ButtonSlide" id="btnclass" onclick="SlideInOut('timepicker','btnclass');" style="top:10px;">Schedule an Appointment</button>	
	
	
    <form method="post" >
	<div class="contentButtonDiv" >
			<div class="container_buttons_change" id="timepicker">
    	 
				
					
						<div>							
						<center>
							<div class="textlbl">
							<?php
							
							if(	$select_db = mysql_select_db('dtcdenta_DB', $link))
								{

								 
									$sql    = "SELECT * FROM ACCOUNT where Account_ID ='".$acctid."'";
								 
									$result1 = mysql_query($sql,$link);
								
								while($row = mysql_fetch_array($result1))
								  {
									$acctamt=$row['Account_Balance'];
								  }
								  
								} 
							?>
							
							<div id="ServiceRq" style=" display:block" >
								<label for ="serviceId" class="textlblNoCenter">Select purpose of the visit</label><tb>
								<select class="ServID" id = "serviceId" style=" display:inline;width:15em;"> 
								<option value = 0>Pick a Service</option>
								<?php
								
									$sql    = "SELECT * FROM SERVICE";
									$result1 = mysql_query($sql,$link);
									
									while($row = mysql_fetch_array($result1))
										{
											echo '<option value = "'.$row['Service_ID'].'">'.$row['Service_Description'].'</option>';
										}
								?>
								</select>
							</div>
							<div id="DoctorName" style=" display:block;">
							<label for ="Doc" class="textlblNoCenter">Select the Doctor's Name</label>
							<select class="Doc" id = "DocName" style=" display:inline;width:15em;">
							</div>
							<?php
							
							if(	$select_db = mysql_select_db('dtcdenta_DB', $link))
								{

								 
									$sql    = "SELECT * FROM DENTIST";
								 
									$result1 = mysql_query($sql,$link);
								$itr=0;
								while($row = mysql_fetch_array($result1))
								  {
								  
									echo '<option value = "'.$itr.'">'.$row['Dentist_First_Name'].' '.$row['Dentist_Last_Name'].'</option>';
									
									$itr++;
								  }
								  
								} 
							
							?>
							</select>
							<br/>
							<div id="PatName" style=" display:block">
							<label for = "Patient" class="textlblNoCenter">Select the Patient's Name</label>
							<select class="Patient" id = "PatientName" style=" display:inline;width:15em;">
							</div>
							<?php
							
							if(	$select_db = mysql_select_db('dtcdenta_DB', $link))
								{

								 
									$sql    = "SELECT * FROM PATIENT where Account_ID ='".$acctid."'";
								 
									$result1 = mysql_query($sql,$link);
								$itr=0;
								$pat =0;
								while($row = mysql_fetch_array($result1))
								  {
									$pat =0;
									echo '<option value = "'.$row['Patient_ID'].'">'.$row['Patient_First_Name'].' '.$row['Patient_Last_Name'].'</option>';
									
									$itr++;
								  }
								  
								} 
							
							?>
							</select>							
							</div>
							
							

							
							<div id='datepicker' class="datepickerclass"></div>
							
							<div id="buttoncontainmain" class="buttoncontain">
							
							<div style="display: inline;">
									<div style="display: inline" <?php echo $tdclass[0];?>>
									<input type="radio" name="radiog_lite" id="radio0" value=0 <?php echo $arrradioclass[0]; ?> onclick="ChangeButtonClr();"/>
									<label for="radio0" class="css-label"></label><label for="radio0" class="css-label2">08:00AM - 09:00AM</label>
									</div>
									<div style="display: inline"<?php echo $tdclass[1];?>>
									<input type="radio" name="radiog_lite" id="radio1" value=1 <?php echo $arrradioclass[1]; ?> onclick="ChangeButtonClr();"/>
									<label for="radio1" class="css-label"></label><label for="radio1" class="css-label2">09:00AM - 10:00AM</label>
									</div>
									<div style="display: inline" <?php echo $tdclass[2];?>>
									<input type="radio" name="radiog_lite" id="radio2" value=2 <?php echo $arrradioclass[2]; ?> onclick="ChangeButtonClr();"/>
									<label for="radio2" class="css-label"></label><label for="radio2" class="css-label2">10:00AM - 11:00AM</label>
									</div>
								</div>
								<div style="display: inline">
									<div style="display: inline" <?php echo $tdclass[3];?>>
									<input type="radio" name="radiog_lite" id="radio3" value=3 <?php echo $arrradioclass[3]; ?> onclick="ChangeButtonClr();"/>
									<label for="radio3" class="css-label"></label><label for="radio3" class="css-label2">11:00AM - 12:00PM</label>
									</div>
									<div  style="display: inline"<?php echo $tdclass[4];?>>
									<input type="radio" name="radiog_lite" id="radio4" value=4 <?php echo $arrradioclass[4]; ?> onclick="ChangeButtonClr();"/>
									<label for="radio4" class="css-label"></label><label for="radio4" class="css-label2">12:00PM - 01:00PM</label>
									</div>
									<div  style="display: inline"<?php echo $tdclass[5];?>>
									<input type="radio" name="radiog_lite" id="radio5" value=5 <?php echo $arrradioclass[5]; ?> onclick="ChangeButtonClr();"/>
									<label for="radio5" class="css-label"></label><label for="radio5" class="css-label2">01:00PM - 02:00PM</label>
									</div>
								</div>
								<div style="display: inline">							
									<div style="display: inline" <?php echo $tdclass[6];?>>
									<input type="radio" name="radiog_lite" id="radio6" value=6 <?php echo $arrradioclass[6]; ?> onclick="ChangeButtonClr();"/>
									<label for="radio6" class="css-label"></label><label for="radio6" class="css-label2">02:00PM - 03:00PM</label>
									</div>
									<div style="display: inline" <?php echo $tdclass[7];?>>
									<input type="radio" name="radiog_lite" id="radio7" value=7 <?php echo $arrradioclass[7]; ?> onclick="ChangeButtonClr();"/>
									<label for="radio7" class="css-label"></label><label for="radio7" class="css-label2" >03:00PM - 04:00PM</label>
									</div>
									<div style="display: inline" <?php echo $tdclass[8];?>>
									<input type="radio" name="radiog_lite" id="radio8" value=8 <?php echo $arrradioclass[8];?> onclick="ChangeButtonClr();"/>
									<label for="radio8" class="css-label"></label><label for="radio8" class="css-label2">04:00PM - 05:00PM</label>
									</div>
								</div>							
							</div>	
						</center>
						</div>
						
							<div class="submitbtn" style="display: block;" id="subForm1">
						<input  type=submit id ="btnID" value="submit" disabled class = "btn1"/>
						
				</div>				
					</div>
					
					
							
			
				</div>
				

		</form>
	
	<button id="btnclass2" class="ButtonSlide" onclick="SlideInOutAcct('acctId','btnclass2');" style="top:10px;">Account Balance</button>	
	
			
	<div class ="AcctInfo_change" id="acctId">
    <div id="inlineblocks" class = "textlbl" >Your Account Balance is :</div>
	<div id="inlineblocks" class = "textlbl" ><?php echo $acctamt; ?></div>
	</div>
	
	<button id="btnclass4" class="ButtonSlide" onclick="SlideInOutMan('addId','btnclass4');" style="top:10px;">Manage Account</button>	
	
			
	<div class ="AcctInfo_change" id="addId">
		<a href="editprof.php"><div style='padding-top:.5em;display:inline;'><input type=button class = 'btn2' Value='Edit Profile' style='width:12em;text-decoration:none;'/></div></a>
		<a href= "adduser.php"><div style='padding-top:.5em;display:inline;'><input type=button class = 'btn2' Value='Add Additional User' style='width:12em;text-decoration:none;'/></div></a>
	</div>
   
   
	
   <button id="btnclass3" class="ButtonSlide" onclick="SlideInOutUp('resId','btnclass2');" style="top:10px;">Upcoming Appointments</button>	
	
			
	<div class ="AcctInfo_change" id="resId" style="top:20px;">
		<div id="inlineblocks" >
		<?php 
			$datearray = getdate();
			$todaysdate = $datearray['year'].'-'.$datearray['mon'].'-'.$datearray['mday'];
		 
			$sql    = "Select Count(*) as CNum from APPOINTMENT where Appointment_Date >= '".$todaysdate."' and Patient_ID in (Select Patient_ID From PATIENT where Account_ID =".$acctid.") order by Appointment_Date";
			$result = mysql_query($sql,$link);
			$CountRec=0;
			while($row = mysql_fetch_array($result))
			{
				$CountRec=$row['CNum'];
			}
			
			if($CountRec >0)
			{
				$sql    = "Select * from APPOINTMENT where Appointment_Date >= '".$todaysdate."' and Patient_ID in (Select Patient_ID From PATIENT where Account_ID =".$acctid.") order by Appointment_Date";
				 
				$result = mysql_query($sql,$link);
				$itr =0;
				echo '<div >';
					while($row = mysql_fetch_array($result))
						{
							$name ="default";
							$sql    = "Select * from PATIENT where Patient_ID = ".$row['Patient_ID'];
							$result1 = mysql_query($sql,$link);
							while($row1 = mysql_fetch_array($result1))
							{
								$name = $row1['Patient_First_Name']." ".$row1['Patient_Last_Name'];
							}
							echo '<div onclick="SetButton("radio'.$itr.'")">';
							echo '<input type="radio" name="radioAppt" id="radio'.$itr.'" class="Appt" value='.$row['Appointment_ID'].' checked /><label style="width:auto;padding-left:.5em;" for="radio'.$itr.'" class="textlbl">Date:'.$row['Appointment_Date'].'    |    Time:  '.$row['Appointment_Time'].'    |    Patient Name:'.$name.'</label>';
							echo '</div>';
						}
						
				echo "<div style='padding-top:.5em;display:block;'><input type=button class = 'btn2' id='delAppt' Value='Delete Appointment' style='width:auto;text-decoration:none;'/></div>";
				echo '</div>';	
			}
			else
			{
				echo "<div style='padding-top:.5em;display:block;' class='textlbl'>You do not have any upcoming appointments</div>";
			}
		?>
		</div>
	
	
	</div>
	
 </div>  
 
<!--BEGIN FOOTER-->
	<div id="footer_desktop">
	<center> Copyright INFO 621 Group 4 </center>
    </div>
<!--BEGIN MOBILE LOGOUT-->
	<div id="logout_button_mobile" ><?php if(isset($_SESSION['AcctId'])){echo "<li class='logout_button'><a href='logout.php'>Log Out</a></li>";} ?></div> 
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
  
	<script type="text/javascript">
   function SubmitForm(){
   document.form1.submit.click(); 
   }
   </script>
   
   <script  type="text/javascript">
	function ChangeButtonClr() {
	
	 var btnElem = document.getElementById("btnID");
	 btnElem.setAttribute('class','changeBtn');
	 btnElem.disabled=false;

	}
	
	</script>
	
	<script  type="text/javascript">
	function ChangeButtonClrGray() {
	
	 var btnElem = document.getElementById("btnID");
	 btnElem.setAttribute('class','btn1');
	 btnElem.disabled=true;

	}
	
	</script>
	
   <script type="text/javascript">
   function SetDateSel(){
   <?php echo "var datedata = new Date('".$date."');" ?>
	<?php echo "$( '#datepicker' ).datepicker( 'setDate', datedata);"; ?>
   }
   </script>
   
   <script type="text/javascript">
   function SlideInOut(el,perc){
	
   }
   </script>
   <script type="text/javascript">
   function SlideInOut(el,elbtn){
	var elem = document.getElementById(el);
		if(slidectrsch%2==0){
			elem.style.transition = "height .5s linear 0s";
			elem.setAttribute('class','container_buttons');
			slidectrsch++;
			
		}
		else
		{
			elem.style.transition = "height 0.5s linear 0s";
			elem.setAttribute('class','container_buttons_change');
			slidectrsch++;
		}
   }
   </script>
   <script type="text/javascript">
   function SlideInOutAcct(el,elbtn){
	var elem = document.getElementById(el);
		if(slidectracct%2==0){
			elem.style.transition = "height .2s linear 0s";
			elem.style.transition = "width .28 linear 0s";
			elem.setAttribute('class','AcctInfo');
			slidectracct++;
			
		}
		else
		{
			elem.style.transition = "height 0.2s linear 0s";
			elem.style.transition = "width .8s linear 0s";
			elem.setAttribute('class','AcctInfo_change');
			slidectracct++;
		}
   }
   </script>
   <script type="text/javascript">
   function SlideInOutMan(el,elbtn){
	var elem = document.getElementById(el);
		if(slidectrman%2==0){
			elem.style.transition = "height .2s linear 0s";
			elem.style.transition = "width .28 linear 0s";
			elem.setAttribute('class','AcctInfo');
			slidectrman++;
			
		}
		else
		{
			elem.style.transition = "height 0.2s linear 0s";
			elem.style.transition = "width .8s linear 0s";
			elem.setAttribute('class','AcctInfo_change');
			slidectrman++;
		}
   }
   </script>
   <script type="text/javascript">
   function SlideInOutUp(el,elbtn){
	var elem = document.getElementById(el);
		if(slidectrup%2==0){
			elem.style.transition = "height .2s linear 0s";
			elem.style.transition = "width .28 linear 0s";
			elem.setAttribute('class','AcctInfo');
			slidectrup++;
			
		}
		else
		{
			elem.style.transition = "height 0.2s linear 0s";
			elem.style.transition = "width .8s linear 0s";
			elem.setAttribute('class','AcctInfo_change');
			slidectrup++;
		}
   }
   </script>
   
	
	
  
  <!-- Account Information -->
    

 
  </body>
</html>
