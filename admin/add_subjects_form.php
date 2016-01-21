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
<li class="treeview active">
 <a href="#">
<span>Courses </span>
<i class="fa fa-angle-left pull-right text-green"></i>
</a>
<ul class="treeview-menu">
<li><a href="view_subject.php">
<span>View Courses</span>
<i class="fa fa-angle-left pull-right"></i>
 </a>
 </li>
<li class="active">
<a href="add_subjects_form.php">
<span>Add Courses</span> 
<i class="fa fa-angle-left pull-right  text-green"></i>
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
          <h1>
            Add New Courses 
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-header with-border">
<h3 class="box-title"> 
<a></i><b>Add Course</b></a>
</h3>
                </div>
                <?php
if(isset($_SESSION['exist'])){
if($_SESSION['exist']=="existed"){
?>
<div class="box-header with-border">
<span style="color:red;">Depatment id or Name already exist </span>
</div>
<?php
}
unset($_SESSION['exist']);
}
?>
   <form role="form" action="insert_data1.php" method="post" enctype="multipart/form-data">
  <div class="box-body">
<div class="form-group">
<div class="form-group">
<label>Department</label>
<select name="dept" class="form-control">
<option value="">Select Department</option>
<?php
$sql="select * from departments";
$result=  mysql_query($sql);
while($row=mysql_fetch_array($result)){
?>
<option value="<?=$row['dept_id']?>"><?=$row['dept_name']?></option>
<?php	
}
?>
<option value="others">others</option>
</select>
</div>
<label>Course ID</label>
 <input type="text" class="form-control" name="id" placeholder="Course ID" />
</div>
<div class="form-group">
<label>Course Name</label>
 <input type="text" class="form-control" name="subject" placeholder="Course Name" />
</div>
  <div class="box-footer">
<button type="submit" name="action" value="new_subject" class="btn btn-primary">Submit</button>
  </div>
</form>
  </div>
</div>
  </div>  
</section>
  </div>
</div>
<footer class="main-footer">
<div class="pull-right hidden-xs">
<b></b> 
</div>

</footer>
    <script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script src="./bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <script src="./dist/js/app.min.js" type="text/javascript"></script>
    <script src="./dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
