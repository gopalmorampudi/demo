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
<li class="treeview  active">
  <a href="#">
<span>Tutor</span><i class="fa fa-angle-left pull-right  text-green"></i>
  </a>
  <ul class="treeview-menu">
  <li class=" active">
  	<a href="view_all_tutor.php">
  	<span>View All Tutors</span>	
  	<i class="fa fa-angle-left pull-right  text-green"></i>
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
</ul
</section>
</aside>
<div class="content-wrapper">
<section class="content-header">
<h1></i>
Tutor
<small>Details tables</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"></i></a></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-6">
<div class="box">
<div class="box-header">
  <h3 class="box-title">Tutor Profile</h3>
</div>
<div class="box-body no-padding">
<?php
$tutor_id=$_REQUEST['tutor_id'];
$sql="select * from tutor where tutor_id=$tutor_id";
$res=mysql_query($sql);
while($rs=mysql_fetch_assoc($res)){
	?>	
  <table class="table table-striped">
<tr>
  <th
  <th>Tutor Name</th>
  <td><?=$rs['tutor_name']?></td>
</tr>
<tr>
  <th>Tutor Email</th>
  <td><?=$rs['emailid']?></td>
</tr>
<tr>
  <th>Tutor Phone</th>
  <td><?=$rs['phone_number']?></td>
</tr>
                   
<tr>
  <th>Tutor Subject</th>
  <td><?php
  $sql1="select s.subject_name from subject s where s.subject_id in(".$rs['subject'].")";
  $results=mysql_query($sql1);
  while($r=mysql_fetch_assoc($results))
	  echo $r['subject_name']."  ";
  ?></td>
</tr>
<tr>
  <th>Working Hours</th>
  <td><?=$rs['working_hours']?></td>
</tr>
<tr>
  <th>Working Days</th>
  <td><?=$rs['working_days']?></td>
</tr>
  </table>
  <?php	
	}
?>
                </div>
              </div>
               </div>
 <div class="col-xs-6">             
 <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Number of Working Hours</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
$query="SELECT a_date, from_hour, to_hour, from_min, to_min, from_period, to_period FROM appointments WHERE instructor_id=$tutor_id and status='app_fixed' and status1='fixed'";
$result=mysql_query($query);
$i=0;
$totalTime='';
while($res=mysql_fetch_array($result)){
$a_date=$res['a_date'];
$from_hour=$res['from_hour'];
$to_hour=$res['to_hour'];
$from_min=$res['from_min'];
$to_min=$res['to_min'];
$from_period=$res['from_period'];
$to_period=$res['to_period'];
if($from_min<9){
$from_min1= "0".$from_min;
}else{
$from_min1=$from_min;
}
if($to_min<9){
$to_min1= "0".$to_min;
}else{
$to_min1=$to_min;
}
$date=$a_date;
$fTime=$from_hour.":".$from_min1." ".$from_period;
$TTime=$to_hour.":".$to_min1." ".$to_period;
/*
echo "Form Time=".$fTime;
echo "<br/>";
echo "TO Time=".$TTime;
echo "<br/>";*/
$formTime_in_24_hr  = date("H:i", strtotime($fTime));
$ToTime_in_24_hr  = date("H:i", strtotime($TTime));
$start_date = new DateTime($date.' '.$formTime_in_24_hr);
$since_start = $start_date->diff(new DateTime($date.' '.$ToTime_in_24_hr));
//echo $since_start->days.' days total<br>';
//echo $since_start->y.' years<br>';
//echo $since_start->m.' months<br>';
//echo $since_start->d.' days<br>';
$hours=$since_start->h;
$mints=$since_start->i;
//$since_start->h.' hours<br>';
//$since_start->i.' minutes<br>';
//echo $since_start->s.' seconds<br>';
$totalTime2='';
if($i==0){
$totalTime=$hours.":".$mints;
}
else {	
$day1hours = $totalTime;
$day2hours = $hours.":".$mints;
$day1 = explode(":", $day1hours);
$day2 = explode(":", $day2hours);
$totalmins = 0;
$totalmins += $day1[0] * 60;
$totalmins += $day1[1];
$totalmins += $day2[0] * 60;
$totalmins += $day2[1];
$hoursTotal = $totalmins / 60;
$hours1=0;
$hours1 = explode(".", $hoursTotal);
$hours1= $hours1[0];
$minutes = $totalmins % 60;
$totalTime = "$hours1".':'."$minutes";	
}	
$i++;
}
$totalTime;
if($totalTime!=""){
$finaltime= explode(":", $totalTime);
$finalHours =$finaltime[0];
$finalMints =$finaltime[1];
$finals=$finalHours. " Hours"." ".$finalMints ." Minutes";
}else{
	
$finals="NO working hours";	
}
?>
<form class="form-horizontal" method="post" action="">
<div class="box-body">
<h3>Total Working Hours :- <?=$finals?></h3>
  <div class="col-sm-10">
 <div class="form-group">
<label>Select Year:</label> 	
<select class="form-control" name="year" required>
<option value="">Select Year</option>
<?php
$currentYear=date('Y', mktime(0, 0, 0, date('m'), date('d') +0, date('Y')));
for($i=2014;$i<=$currentYear;$i++){
	?>
<option value="<?=$i?>"><?=$i?></option>
<?php
}
?>
</select>
</div>
<?php
$age = array("January"=>"01", "February"=>"02", "March"=>"03", "April"=>"04", "May"=>"05", "June"=>"06", "July"=>"07", "August"=>"08", "September"=>"09", "October"=>"10", "November"=>"11","December"=>"12");
?>
<div class="form-group">
<label>Select Month:</label> 		
<select class="form-control" name="month" required >
<option>Select Month</option>
<?php
foreach($age as $x => $x_value) {
?>
<option value="<?=$x_value?>"><?=$x?></option>
<?php
}
?>
</select>
</div>
 <div class="box-footer">
<button type="submit" class="btn btn-info" name="submit">Submit</button>
  </div><!-- /.box-footer -->
</div>
  </div><!-- /.box -->  
  </form>  
</div>


<?php
if(isset($_REQUEST['submit'])){
$year=$_REQUEST['year'];	
$month=$_REQUEST['month'];	
$fromDate=$year."-".$month."-"."01";	
$toDate=$year."-".$month."-"."31";	

$quary1="SELECT a_date, from_hour, to_hour, from_min, to_min, from_period, to_period FROM appointments 
WHERE instructor_id=$tutor_id and status='app_fixed' and status1='fixed' and (a_date>='$fromDate' and a_date<='$toDate')";
$result1=mysql_query($quary1);
$i=0;
$totalTime='';
while($res1=mysql_fetch_array($result1)){
$a_date=$res1['a_date'];
$from_hour=$res1['from_hour'];
$to_hour=$res1['to_hour'];
$from_min=$res1['from_min'];
$to_min=$res1['to_min'];
$from_period=$res1['from_period'];
$to_period=$res1['to_period'];
if($from_min<9){
$from_min1= "0".$from_min;
}else{
$from_min1=$from_min;
}
if($to_min<9){
$to_min1= "0".$to_min;
}else{
$to_min1=$to_min;
}
$date=$a_date;
$fTime=$from_hour.":".$from_min1." ".$from_period;
$TTime=$to_hour.":".$to_min1." ".$to_period;
/*
echo "Form Time=".$fTime;
echo "<br/>";
echo "TO Time=".$TTime;
echo "<br/>";*/
$formTime_in_24_hr  = date("H:i", strtotime($fTime));
$ToTime_in_24_hr  = date("H:i", strtotime($TTime));
$start_date = new DateTime($date.' '.$formTime_in_24_hr);
$since_start = $start_date->diff(new DateTime($date.' '.$ToTime_in_24_hr));
//echo $since_start->days.' days total<br>';
//echo $since_start->y.' years<br>';
//echo $since_start->m.' months<br>';
//echo $since_start->d.' days<br>';
$hours=$since_start->h;
$mints=$since_start->i;
//$since_start->h.' hours<br>';
//$since_start->i.' minutes<br>';
//echo $since_start->s.' seconds<br>';
$totalTime2='';
if($i==0){
$totalTime=$hours.":".$mints;
}
else {	
$day1hours = $totalTime;
$day2hours = $hours.":".$mints;
$day1 = explode(":", $day1hours);
$day2 = explode(":", $day2hours);
$totalmins = 0;
$totalmins += $day1[0] * 60;
$totalmins += $day1[1];
$totalmins += $day2[0] * 60;
$totalmins += $day2[1];
$hoursTotal = $totalmins / 60;
$hours1=0;
$hours1 = explode(".", $hoursTotal);
$hours1= $hours1[0];
$minutes = $totalmins % 60;
$totalTime = "$hours1".':'."$minutes";	
}	
$i++;
}
$totalTime;
if($totalTime!=""){
$finaltime= explode(":", $totalTime);
$finalHours =$finaltime[0];
$finalMints =$finaltime[1];
$finals=$finalHours. " Hours"." ".$finalMints ." Minutes";
}else{
	
$finals="NO working hours";	
}
?>
<div class="box-header with-border" style="background: rgb(60, 141, 188); color: white;">
<h3 class="box-title">Working Hours for this Month:- <?=$finals?></h3>
</div><!-- /.box-header -->
<?php
}
?>

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
