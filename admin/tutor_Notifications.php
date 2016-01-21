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
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

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
<span>Tutor</span><i class="fa fa-angle-left pull-right "></i>
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
<li class="treeview active">
<a href="tutor_Notifications.php">
<span>Tutors Notifications</span>
<i class="fa fa-angle-left pull-right  text-green"></i>
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
Tutor Notification
<small>Details table</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"></a></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h1 class="box-title">
<a></i><b>Tutor Notifications</b></a> 
</h1>
</div>	
<div class="box-body">
<table id="example1"  class="table table-bordered table-striped">
<thead>
<tr>
<th>Tutor ID</th>
<th>Date</th>
<th>From Time</th>
<th>To Time</th>
<th>Reason</th>
<th>Description</th>
<th>Operations</th>
</tr>
</thead>
<tbody>
<?php
$sql="select * from tutor_request where status='pending'";
$res=mysql_query($sql);
while($rs=mysql_fetch_assoc($res)){
?>	
<tr>
<td><?=$rs['tutorid']?></td>
<td><?=$rs['data']?></td>
<td><?=$rs['from_time']?></td>	
<td><?=$rs['to_time']?></td>	
<td><?=$rs['reason']?></td>	
<td><?=$rs['description']?></td>	
<td>
<form action="update_tutor_notifications.php" method="post">
<input type="hidden" name="tutorid" value="<?=$rs['tutorid']?>">
<input type="hidden" name="date" value="<?=$rs['data']?>">
<input type="hidden" name="from_time" value="<?=$rs['from_time']?>">
<input type="hidden" name="to_time" value="<?=$rs['to_time']?>">
<input type="hidden" name="reason" value="<?=$rs['reason']?>">
<input type="hidden" name="description" value="<?=$rs['description']?>">

<input type="submit" name="action" value="Accept" class="btn btn-primary">
<input type="submit" name="action" value="Reject" class="btn btn-primary">
</form>
</td>	
</tr>
<?php	
	}
?>
</tbody>
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
