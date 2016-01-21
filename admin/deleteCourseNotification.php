<?php
session_start();
include 'dbconnection.php';
$action=$_REQUEST['action'];
if($action=='CourseReq')
{
$id=$_REQUEST['id'];
$sql="delete from course_notifications where id=$id";
$res=mysql_query($sql);
if($res){
	header('Location:student_course_notifications.php?success');
}else{
	header('Location:student_course_notifications.php?fail');
}
}
if($action=='time_Ruq')
{
$id=$_REQUEST['id'];
$sql="delete from stu_req_inconvenient_time where id=$id";
$res=mysql_query($sql);
if($res){
	
	header('Location:std_Notifications.php?success');
}else{
	header('Location:std_Notifications.php?fail');
}
}
//delete schedule
if($action=='Subdelete')
{
$id=$_REQUEST['id'];	
$sql1="DELETE FROM schedule WHERE id=$id";
$res1=mysql_query($sql1);
if($res1){
	$_SESSION['flag']='success';
		header('Location:view_new_schedule.php?success');
	}else{
		$_SESSION['flag']='fail';
		header('Location:view_new_schedule.php?fail');
	} 
}
//update Schedule
if($action=='update')
{
$id=$_REQUEST['id'];
$tperiod=$_REQUEST['tperiod'];
$tminutes=$_REQUEST['tminutes'];
$thour=$_REQUEST['thour'];
$fperiod=$_REQUEST['fperiod'];
$fminutes=$_REQUEST['fminutes'];
$fhour=$_REQUEST['fhour'];
$date_col=$_REQUEST['date_col'];
$week_day=$_REQUEST['week_day'];
	echo $sql="update schedule set fhour='$fhour',fminutes='$fminutes',fperiod='$fperiod'thour='$thour',tminutes='$tminutes',tperiod='$tperiod',date_col='$date_col',week_day='$week_day' where id=$id ";
	 $res=mysql_query($sql);
	if($res){
		header("Location:view_schedule.php?success");
	}else{
		header("Location:view_schedule.php?success");
	} 
}
?>
