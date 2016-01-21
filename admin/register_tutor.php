<?php
include("MainClass.class.php");
$object=new MainClass();
$subjectsArray=$object->getAllSubject();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tutor|Register</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/style.css">
  </head>
<body>
	
<div class="navbar navbar-inverse">   
<div class="container"> 
  <nav class="navbar navbar-static-top" role="navigation">
           <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a href="index.php" style="color:#3d84e6;text-decoration:none;"><h1>STEM</h1></a>
			</div>
            
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav pull-right mainNav">
					<li><a href="index.php">Courses</a></li>
				
					 <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Student<b class="caret"></b></a> 
                        <ul class="dropdown-menu">
                            <li><a href="login_student.html">Login</a></li>
                            <li class="active"><a href="studentregister.php">Register</a></li>
                         </ul>
                    </li>
					<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tutor<b class="caret"></b></a> 
                        <ul class="dropdown-menu">
                           <li><a href="login.html">Login</a></li>
                            <li class="active"><a href="register_tutor.php">Register</a></li>
                         </ul>
                    </li>
					<li><a href="contact.php">Contact</a></li>                  
                </ul>
            </div>
        </nav>
</div>
</div>

		<header id="head" class="secondary">
            <div class="container">
                    <h1> Tutor Registration</h1>
                    <p> </p>
                </div>
    </header>

	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title">Tutor Register Here</h3>
						<form class="form-light mt-20" action="insert_data.php?action=insert_tutor_reg" method="post" role="form" onsubmit="return tutorRegistrationFormValidation();">

							<div class="form-group">
								<label>UserName</label>
								<input type="text" class="form-control" id="tutorName" name="tutor_name" placeholder="Enter Your Name" onkeypress="noneErrors(tutorName,tutorNameError);">
								<span id="tutorNameError" style="color:red;"></span>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Email ID</label>
										<input type="email" name="emailid" id="emailId" class="form-control" placeholder="Enter Email ID" onblur="emailExistsOrNot();" onkeypress="noneErrors(emailId,email2Error);">
										<span id="emailError"></span>
										<span id="email2Error" style="color:red;"></span>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" onkeypress="noneErrors(password,passwordError);">
										<span id="passwordError" style="color:red;"></span>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Confirm Password</label>
										<input type="password" name="Confirmpassword" id="confPassword" class="form-control" placeholder="Enter Confirm Password" onkeypress="noneErrors(confPassword,confpasswordError);">
										<span id="confpasswordError" style="color:red;"></span>
									</div>
								</div>
							</div>
                             <div class="form-group">
								<label>Phone Number</label>
								<input type="text" name="phone_number" id="phoneNumber" class="form-control" placeholder="Enter Your Phone Number" onkeypress="noneErrors(phoneNumber,phoneError);" onblur="phonenumber();" maxlength="10">
								<span id="phoneError" style="color:red;"></span>
							</div>
							<div class="form-group">
								<label>Select Subject</label><br>
								<?php
								$i=0;
									foreach($subjectsArray as $subject){
								?>
			<input type="checkbox" id="sub<?=$i?>" onchange="noneErrors(sub<?=$i?>,subError);" name="subject[]" value="<?=$subject[0]?>"><?=$subject[1]?>&nbsp;&nbsp;
								<?php
								$i++;
									}
								?><br>
								<span id="subError" style="color:red;"></span>
	                <br>			
							</div>
							 <div class="form-group">
								<label>Working Hours</label>
								<select class="form-control" name="working_hours" id="wh" onchange="noneErrors(wh,WHoursError);" >
								<option value="">Select Hours</option>
								  <option value="01">01</option>
								   <option value="02">02</option>
								   <option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
							</select>
							<span id="WHoursError" style="color:red;"></span>

							</div>
							 <div class="form-group">
								<label>Working Days</label><br>
								<?php
								$j=0;
								$weekDaysArray=array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
								foreach($weekDaysArray as $day){
								?>
								<input type="checkbox" onchange="noneErrors(d<?=$j?>,WDaysError);" id="d<?=$j?>" name="working_days[]" value="<?=$day?>"/><?=$day?>&nbsp;&nbsp;&nbsp;								
								<?php 
								$j++;
								}
								?><span id="WDaysError" style="color:red;"></span>
							</div>
							
							<button type="submit" name="action" value="insert_tutor_reg" class="btn btn-two">Submit</button>
							<p><br/></p>
						</form>
						
					</div>
					
				</div>
			</div>

	 <footer id="footer">
 
		<div class="container">
  

			<div class="clear"></div>
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">


					<div class="col-md-6 panel">
						
					</div>

				</div>
			</div>
		</div>
	</footer>


<script>
		function tutorRegistrationFormValidation(){
			var username=document.getElementById('tutorName').value;
			var password=document.getElementById('password').value;
			var confPassword=document.getElementById('confPassword').value;
			var emailId=document.getElementById('emailId').value;
			var phoneNumber=document.getElementById('phoneNumber').value;
			var wh=document.getElementById('wh').value;
			
			var emailError=document.getElementById('emailError');
			
			var subChecks = document.getElementsByName('subject[]');
			var subCount=0;
			for(var i=0;i<subChecks.length;i++){
				if(document.getElementById('sub'+i).checked){
					subCount++;
				}
			}
			
			
			var weekChecks = document.getElementsByName('working_days[]');
			var weekCount=0;
			for(var i=0;i<weekChecks.length;i++){
				if(document.getElementById('d'+i).checked){
					weekCount++;
				}
			}
			
			 if(username==''  || password=='' || confPassword=='' || emailId=='' || phoneNumber==''|| wh=='' || subCount==0 ||weekCount==0){
				if(username==''){
					document.getElementById('tutorNameError').innerHTML='Please fill tutor name field';
				}
				if(emailId==''){
					
					document.getElementById('email2Error').innerHTML='Please fill email id field';
				}
				if(password==''){
					
					document.getElementById('passwordError').innerHTML='Please fill password field';
				}
				if(confPassword==''){
					
					document.getElementById('confpasswordError').innerHTML='Please fill confirm password field';
				}
				if(phoneNumber==''){
					
					
					
					document.getElementById('phoneError').innerHTML='Please fill phone number field';
				} 
				if(wh==''){
					
					document.getElementById('WHoursError').innerHTML='Please fill working hours field';
				} 
				if(subCount==0){
					document.getElementById('subError').innerHTML='Please select any one of course';
				}
				if(weekCount==0){
					document.getElementById('WDaysError').innerHTML='Please select at least one week day';
				}
				return false;
			}
			if(password!=confPassword){
				document.getElementById('confpasswordError').innerHTML='password and confirm password mismatch';
				return false;
			}
			if(emailError.innerHTML=='This email id already exist'){
				return false;
			} 
			
		//var phoneNumber=document.getElementById('phoneNumber').value;


			if(document.getElementById('phoneError').innerHTML=='Please enter valid phone number'){
				return false;
			}
			if(document.getElementById('phoneError').innerHTML=='Please enter 10 digits phone number')			 {
				return false;
			}
			 
			return true;
		}
		
	</script>
<script>
	function phonenumber()  
{  

 var phoneNumber=document.getElementById('phoneNumber').value;
 if(isNaN(phoneNumber)){ 
 	document.getElementById('phoneError').innerHTML='Please enter valid phone number ';
 	return false;
 }else{
 	if(phoneNumber.length!=10){
 	document.getElementById('phoneError').innerHTML='Please enter 10 digits phone number';
 	return false;
 	}
 }
  }

function emailExistsOrNot() {
  var xhttp;
  var emailId=document.getElementById('emailId').value;
  var emailError=document.getElementById('emailError');
  if (window.XMLHttpRequest) {
    xhttp = new XMLHttpRequest();
    } else {
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
	  var result=xhttp.responseText;
	  if(result=='exists'){
		  emailError.innerHTML="This email id already exist";
		  emailError.setAttribute("style", "color: red;");
	  }else{
	  }
    }
  };
  var url="checkTutorEmailForValidation.php?mail="+emailId;
  xhttp.open("GET", url, true);
  xhttp.send();
}
function noneErrors(id1,id2){
	if(id1.value!=''){
		id2.innerHTML='';
	}
}
</script>

</body>
</html>
