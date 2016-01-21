<?php
include 'dbconnection.php';
require_once('lib/swift_required.php');
$action=$_REQUEST['action'];
if($action=="Accept"){
$student_id=$_REQUEST['student_id'];
$sbtid=$_REQUEST['sbtid'];
$student_name=$_REQUEST['student_name'];
$student_email=$_REQUEST['student_email'];
$student_cell=$_REQUEST['student_cell'];
$password=$_REQUEST['password'];
$courses_list=$_REQUEST['courses_list'];
$courseArray=explode(",",$courses_list);
$working_hours=$_REQUEST['working_hours'];
$working_days=$_REQUEST['working_days'];
$qry="INSERT INTO `tutor`(`tutor_name`,`emailid`, `password`, `phone_number`,  `subject`,working_hours,working_days,status) VALUES ('$student_name','$student_email','$password','$student_cell','$courses_list',$working_hours,'$working_days','Accept')";
$qry1="UPDATE `student_to_tutor` SET `status`='Accept' WHERE id=$sbtid";
$res=mysql_query($qry);
$res1=mysql_query($qry1);
if($res && $res1){
	$getTutorId="select t.tutor_id from tutor t where t.emailid='$student_email'";
	$res3=mysql_query($getTutorId);
	$tutorID='';
	if($row=mysql_fetch_assoc($res3)){
		$tutorID=$row['tutor_id'];
	}
		 for($i=0;$i<count($courseArray);$i++){
		$query="insert into courses_experience(tutor_id,course_id,expertize) values($tutorID,$courseArray[$i],'OK')";
		$res2=mysql_query($query);
	}
$br=<<<BR
  Hello\r\n
  Your Request(Becoming tutor) has been Accepted.......\r\n 
  Now your eligible to login in tutor account with the Username and Password given below.\r\n
  User Name: $student_email.\r\n
  Password: $password.\r\n
BR;

$new=$br;
// Create the message
$message=Swift_Message::newInstance() ;
//var_dump($message);
$message->setSubject('Acknowledgement');
// Set the From address 
$message->setFrom(array('stem.teamproject@gmail.com'=>"STEM"));
$message->setTo(array($student_email =>"STEM"));
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
$transport->setUsername('stem.teamproject@gmail.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);

header("Location:std_become_tutor.php");
}else{
header("Location:std_become_tutor.php?fail");
} 
}

if($action=="Reject"){
$appId=$_REQUEST['appId'];
$sql="DELETE FROM `student_to_tutor` WHERE id=$appId";
$delres=mysql_query($sql);
if($delres){
header("Location:std_become_tutor.php?sucess");
}else{
header("Location:std_become_tutor.php?fail");
}
}
?>