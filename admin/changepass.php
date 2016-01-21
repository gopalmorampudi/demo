<?php
session_start();
include 'dbconnection.php';
if (empty($_SESSION['adminuser']))
	header("Location:index.php");
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin | STEM</title>
<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="./dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="./dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" /></head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
<a href="#" class="logo"><span class="logo-mini"><b>Admin</b></span><span class="logo-lg"><b>STEM</b></span> </a>
<nav class="navbar navbar-static-top" role="navigation">
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>	
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<li class="dropdown user user-menu">
<h4 style="color: white; padding: 6px;"><span class="logo-lg"><b>Admin</b></span> </h4>
</li>
</ul>
</div>
</nav>
</header>
<aside class="main-sidebar">
<section class="sidebar">
<div class="user-panel">
<ul class="sidebar-menu">
<li class="header">MENU NAVIGATION</li>
<li class="treeview">
<a href="#"><span>Department</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="view_dept.php">
<span>View Departments</span>
<i class="fa fa-angle-left pull-right"></i>
</a></li>
<li>
<a href="add_department.php">
<span>Add Department</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
</ul>
</li>
<li class="treeview">
 <a href="#">
<span>Courses </span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="view_subject.php">
<span>View Courses</span>
<i class="fa fa-angle-left pull-right"></i>
 </a>
 </li>
<li>
<a href="add_subjects_form.php">
<span>Add Courses</span> 
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
</ul>
</li>
<li class="treeview">
  <a href="#">
<span>Tutor</span><i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  <li>
  	<a href="view_all_tutor.php">
  	<span>View All Tutors</span>	
  	<i class="fa fa-angle-left pull-right"></i>
  	</a></li>
   <li>
<a href="request_tutor.php">
<span>Tutor Request</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
  </ul>
  </li>
  <li class="treeview">
  <a href="#">
<span>Schedule</span><i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  <li>
  	<a href="make_schedule.php">
  	<span>Make Schedule</span>	
  	<i class="fa fa-angle-left pull-right"></i>
  	</a></li>
   <li>
<a href="view_schedule.php">
<span>View Schedule</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>

  </ul>
  </li>  
<li class="treeview">
<a href="#">
<span>Students</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><a href="view_all_student.php">
<span>View All Students</span>
<i class="fa fa-angle-left pull-right"></i>
</a></li>
</ul>
</li>
<li class="treeview">
<a href="appointments.php">
<span>View Appointments</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
<li class="treeview">
<a href="tutor_Notifications.php">
<span>Tutors Notifications</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
<li class="treeview">
  <a href="#">
<span>Student Notifications</span><i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  <li>
  	<a href="std_Notifications.php">
  	<span>Inconvenient Timings</span>	
  	<i class="fa fa-angle-left pull-right"></i>
  	</a></li>
   <li>
<a href="student_course_notifications.php">
<span>Course unavailable/Limited</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>

  </ul>
  </li>  

<li class="treeview">
<a href="std_become_tutor.php">
<span>Student As Tutor</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
<li class="treeview">
<a href="enquiries.php">
<span>Enquiries</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
<li class="treeview active">
<a href="changepass.php?action=admin">
<span>change Password</span>
<i class="fa fa-angle-left pull-right text-green"></i>
</a>
</li>
<li class="treeview">
<a href="logout.php">
<span>Logout</span>
<i class="fa fa-angle-left pull-right"></i>
</a>
</li>
</ul>
</section>
</aside>
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary"> 
         <div class="box-header with-border">
<h3 class="box-title"> 
<a><i class="fa fa-arrow-right"></i><b>Change Password</b></a>
</h3>
</div>
<div class="box-body">
<div class="form-group">
<?php
if(isset($_SESSION['flag'])){
if($_SESSION['flag']=='success'){
?>	
<h4 class="section-title" style="color:green;">
<?php
echo 'Your Password Updated successfully';
?>
</h4>
<?php
}else if($_SESSION['flag']=='pwdwrong'){
?>	
<h4 class="section-title" style="color:red;">
<?php	
echo 'Old Password Worng';
?>
</h4>
<?php
}else{
?>	
<h4 class="section-title" style="color:red;">
<?php	
echo 'Sorry we are unable to update your password';
?>
</h4>
<?php
}
}
?>
<form action="updatePassword.php" method="post" onsubmit="return changePasswordValidations()">
<p>Old Password</p>
<span id="oldPassError" style="color:red"></span>
<input type="password" name="oldpassword" id="oldPass" class="form-control" 
onkeypress="noneErrors(oldPass,oldPassError)"/>
<p>New Password</p>
<span id="newPassError" style="color:red"></span>
<input type="password" name="newpassword" id="newPass" class="form-control"
onkeypress="noneErrors(newPass,newPassError)"/>
 <p>Confirm Password</p>
 <span id="confPassError" style="color:red"></span>
 <input type="password"name="confpassword" id="confPass" class="form-control"
onkeypress="noneErrors(confPass,confPassError)"/><br><br>
 <button type="submit" class="btn btn-primary" class="form-control" value="change_password" name="action">submit</button>
 </form>
 </div>
  </div>
</div>
  </div> 
   </div>
</section>
</div>
<footer class="main-footer">
<div class="pull-right hidden-xs">
<b></b> 
</div>
</footer>
<script>
	function changePasswordValidations(){
		var oldPass=document.getElementById('oldPass').value;
		var newPass=document.getElementById('newPass').value;
        var confPass=document.getElementById('confPass').value;
		
        var confPassError=document.getElementById('confPassError');
        var newPassError=document.getElementById('newPassError');
        var oldPassError=document.getElementById('oldPassError');
		if(oldPass=='' || newPass=='' || confPass==''){
				if(oldPass==''){
					oldPassError.innerHTML="Please fill Old password field";
				}
				if(newPass==''){
					newPassError.innerHTML="Please fill New password field";
				}
				if(confPass==''){
					confPassError.innerHTML="Please fill Confirm password field";
				}
				return false;
		}
		if(newPass!=confPass){
				confPassError.innerHTML="New password and confirm password mismatch";
				return false;
			}
		return true;
	}
	function noneErrors(id1,id2){
	if(id1.value!=''){
		id2.innerHTML='';
	}
}
</script>


<script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<script src="./bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<script src="./dist/js/app.min.js" type="text/javascript"></script>
<script src="./dist/js/demo.js" type="text/javascript"></script>
<?php
unset($_SESSION['flag']);
?>
  </body>
</html>