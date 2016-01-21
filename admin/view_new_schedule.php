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
  
<li class="treeview active">
  <a href="#">
<span>Schedule</span><i class="fa fa-angle-left pull-right  text-green"></i>
  </a>
  <ul class="treeview-menu">
  <li>
  	<a href="make_schedule.php">
  	<span>Make Schedule</span>	
  	<i class="fa fa-angle-left pull-right"></i>
  	</a></li>
   <li  class="active">
<a href="view_schedule.php">
<span>View Schedule</span>
<i class="fa fa-angle-left pull-right  text-green"></i>
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
View schedule 
<small></small>
</h1>
<ol class="breadcrumb">
<li><a href="#"></i> </a></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h1 class="box-title">
<a></i><b>View schedule</b></a>
</h1>
</div>	
<div class="box-body">
<h3 class="section-title" style="color:green;">
<?php
						if(isset($_SESSION['flag'])){
							if($_SESSION['flag']=='success'){
								echo 'Schedule deleted successfully';
							}else if($_SESSION['flag']=='failed'){
								echo 'Sorry we are unable to delete your schedule';
							}
						}
					?>
					</h3>
<table id="example1"  class="table table-bordered table-striped">
<thead>
<tr>
<th>DATE </th>
<th>DAY </th>
<th>FROM TIME</th>
<th>TO TIME</th>
<th>OPERATIONS </th>
</tr>
</thead>
<tbody>
<?php
$sql="select * from schedule";
$res=mysql_query($sql);

while($re=mysql_fetch_assoc($res))
{
	$dbFhour=$re['fhour'];
					$dbFmin=$re['fminutes'];
					$dbFperiod=$re['fperiod'];
					if($dbFmin<10){
						$dbFmin="0".$dbFmin;
					}
					//$dbfhm=$dbFhour.$dbFmin;
					
					$dbfhm=$dbFhour.":".$dbFmin." ".$dbFperiod;
					$dbThour=$re['thour'];
					$dbTmin=$re['tminutes'];
					if($dbTmin<10){
						$dbTmin="0".$dbTmin;
					}
					$dbTperiod=$re['tperiod'];
					$dbftm=$dbThour.":".$dbTmin." ".$dbTperiod;
					?>
				<tr>
<form action="edit_data.php" method="post">


					

<td><?=$re['date_col']?></td>
<td><?=$re['week_day']?></td>
<td><?=$dbfhm;?></td>
<td><?=$dbftm;?></td>

<td>
<a href="deleteCourseNotification.php?action=Subdelete&id=<?=$re['id']?>" class="btn btn-primary">Delete</a>
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
