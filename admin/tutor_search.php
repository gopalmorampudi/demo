<?php
session_start();
include 'dbconnection.php';
$tutor_id=$_REQUEST['tutor_id'];
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
<i class="fa fa-angle-left pull-right text-green"></i>
</a>
<ul class="treeview-menu">
<li><a href="view_dept.php">
<span>View Departments</span>
<i class="fa fa-angle-left pull-right text-green"></i>
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

<li class="treeview active">
  <a href="#">
<span>Tutor</span><i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  <li class="active">
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
<li class="treeview ">
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
<li class="treeview">
<a href="changepass.php?action=admin">
<span>change Password</span>
<i class="fa fa-angle-left pull-right"></i>
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
<section class="content-header">
<h1></i>
Tutor schedule
<small>Details table</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"></i> </a></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
	<center>
	 <h3 class="box-title"></h3>
	 </center>
	 <br><br>
<div class="box-header">
 <form action="tutor_search.php" method="get">
<div class="col-xs-8">
<div class="input-group " >

<label style="float: left;">Select Date:</label>
<input type="date" name="date" class="form-control input-sm pull-right" placeholder="Search"  style="width: 180px;"/>
<input type="hidden" name="tutor_id" value="<?=$tutor_id?>"/>
<div class="input-group-btn">
<button class="btn btn-sm btn-default" type="submit">
<i class="fa fa-search"></i>
</button>
</div>
</div>
  </div>
 </form>
</div>
<br>
<div class="box-body table-responsive no-padding">
<table class="table table-hover">
<tr>
<th>Date</th>
<th>Timings</th>
<th>Details</th>
<th>Operations</th>
</tr>
<?php
$currentdate = '';
if(isset($_REQUEST['date'])){
	$currentdate = $_REQUEST['date'];
}
else{
	$currentdate = date('Y-m-d');
}
$sql="select a.a_date, a.from_hour, a.to_hour,a.from_min, a.from_period,a.to_period, a.to_min, sdt.student_name, sub.subject_name from appointments a, student sdt, tutor t, subject sub where sub.subject_id=a.course_code and a.instructor_id= t.tutor_id and a.a_date='$currentdate' and a.instructor_id=$tutor_id and a.`status`='app_fixed' and a.status1='fixed' and sdt.student_id=a.student_id";
$res=mysql_query($sql);

if(mysql_num_rows($res)>0){
while($row=mysql_fetch_assoc($res)) {
?>
<tr>
<td><?=$row['a_date'];?></td>
<td>
<?php
echo "<b>From Time:- </b> ".(($row['from_hour']<9)?'0'.$row['from_hour']:$row['from_hour']).":".(($row['from_min']<9)?'0'.$row['from_min']:$row['from_min'])." ".$row['from_period'];
	echo "<br>";
	echo "<b>To Time:- </b> ".(($row['to_hour']<9)?'0'.$row['to_hour']:$row['to_hour']).":".(($row['to_min']<9)?'0'.$row['to_min']:$row['to_min'])." ".$row['to_period'];
?>
</td>
<td>
<?php
echo "<b>Student Name: </b> " .$row['student_name'];
echo "<br>";
echo "<b>Subject Name: </b> " .$row['subject_name'];
?>
</td>
<td><a href="block_schedule.php?tutor_id=<?=$tutor_id?>&date=<?=$row['a_date']?>&from_hour=<?=$row['from_hour']?>&from_min=<?=$row['from_min']?>&from_period=<?=$row['from_period']?>" class="btn btn-primary">Cancel</a>
</td>
</tr>
<?php
}
}
else{
?>
<tr><td colspan="4" align="center"><b>No Results Found</b></td></tr> 
<?php	
}
?>
</table>
</div>
</div>
</div>
</div>
</section>
</div>
<div class="control-sidebar-bg"></div>
</div>
<footer class="main-footer">
<div class="pull-right hidden-xs">

</div>

</footer>
<script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<script src="./plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="./plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="./bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<script src="./dist/js/app.min.js" type="text/javascript"></script>
<script src="./dist/js/demo.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
$("#example1").DataTable();
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false
});
});
</script>
</body>
</html>
