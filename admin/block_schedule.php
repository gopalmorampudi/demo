<?php
session_start();
include 'dbconnection.php';
$tutor_id=$_REQUEST['tutor_id'];
$date=$_REQUEST['date'];
$from_hour=$_REQUEST['from_hour'];
$from_min=$_REQUEST['from_min'];
$from_period=$_REQUEST['from_period'];
$sql="update tutor_schedule2 t set t.`status`='block' where t.tutor_id=$tutor_id and t.date_day='$date' and t.fhours=$from_hour and t.fminutes=$from_min and t.fperiod='$from_period'";
$sql1="update appointments a set a.`status`='block' where a.instructor_id=$tutor_id and a.a_date='$date' and a.from_hour=$from_hour and a.from_min=$from_min and a.from_period='$from_period'";
$res=mysql_query($sql);
$res1=mysql_query($sql1);
if($res && $res1){
	header("Location:tutor_search.php?tutor_id=$tutor_id&success");
}else{
	header("Location:tutor_search.php?failed");
}

?>