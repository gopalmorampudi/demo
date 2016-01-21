<?php
include 'dbconnection.php';
require_once('lib/swift_required.php');
$action=$_REQUEST['action'];
if($action=="Accept"){
$appId=$_REQUEST['appId'];
$id=$_REQUEST['id'];
$tutor_name=$_REQUEST['tutor_name'];
$tutor_email=$_REQUEST['tutor_email'];
$student_name=$_REQUEST['student_name'];
$subject_name=$_REQUEST['subject_name'];
$student_email=$_REQUEST['student_email'];
$apdate=$_REQUEST['apdate'];
$aptime=$_REQUEST['aptime'];
$qry="UPDATE `appointments` SET `status`='app_fixed' WHERE row_id=$appId";
$qry1="UPDATE `tutor_schedule2` SET `status`='class' WHERE id=$id";
$res=mysql_query($qry);
$res1=mysql_query($qry1);
if($res && $res1){
$br=<<<BR
  Hello,\r\n
  Your Appointment has been fixed, Details are given below..\r\n 
  Tutor Name: $tutor_name.\r\n
  Student Name: $student_name.\r\n
  Subject Name: $subject_name.\r\n
  Date: $apdate.\r\n
  Time: $aptime.\r\n
BR;
$new=$br;
// Create the message
$message=Swift_Message::newInstance() ;
$message->setSubject('Acknowledgement');
// Set the From address 
$message->setFrom(array('stem.teamproject@gmail.com'=>"STEM"));

$message->setTo(array($tutor_email, $student_email));
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
$transport->setUsername('stem.teamproject@gmail.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);

header("Location:appointments.php");
}else{
header("Location:appointments.php?fail");
}
}
if($action=="Reject"){
$appId=$_REQUEST['appId'];
	
$sql="DELETE FROM `appointments` WHERE row_id=$appId";
$delres=mysql_query($sql);
if($delres){
header("Location:appointments.php?sucess");
}else{
header("Location:appointments.php?fail");
}
}

if($action=="Delete"){
$appId=$_REQUEST['appId'];
$sql="DELETE FROM `appointments` WHERE row_id=$appId";
$delres=mysql_query($sql);
if($delres){
header("Location:appointments.php?sucess");
}else{
header("Location:appointments.php?fail");
}
}

//Delete Contact Us Detailes In Database
if($action=="contact_dlt"){
$contact_id=$_REQUEST['contact_id'];
$sql="DELETE FROM `contact` WHERE contact_id=$contact_id";
$delres=mysql_query($sql);
if($delres){
header("Location:enquiries.php?sucess");
}else{
header("Location:enquiries.php?fail");
}
}
?>