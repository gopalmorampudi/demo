<?php
session_start();
include "dbconnection.php";
require_once('lib/swift_required.php');
$action=$_REQUEST['action'];
if($action=='Accept'){
	$tutorid=$_REQUEST['tutorid'];
	$date=$_REQUEST['date'];
	$from_time=$_REQUEST['from_time'];
	$to_time=$_REQUEST['to_time'];
	$reason=$_REQUEST['reason'];
	$description=$_REQUEST['description'];
	$fromArray=explode(" ",$from_time);
	$fperiod=$fromArray[1];
	$fTimeArray=explode(":",$fromArray[0]);
	$fhour=$fTimeArray[0];
	$fmins=$fTimeArray[1];
	$query="select t.emailid from tutor t where t.tutor_id=$tutorid";
		$res=mysql_query($query);
		if($row1=mysql_fetch_array($res)){
		$tutoremail=$row1['emailid'];
		}
	$studentemail='';
 $sql="select * from appointments ap where ap.instructor_id=$tutorid and ap.a_date='$date' and ap.from_hour=$fhour and ap.from_min=$fmins and ap.from_period='$fperiod'";
	$result=mysql_query($sql);
	if($row=mysql_fetch_array($result)){
		if( $row['status']=='app_fixed'){
		 $query="select s.emailid from student s where s.student_id=$row[2]";
		$res=mysql_query($query);
		if($row1=mysql_fetch_array($res)){
		 $studentemail=$row1['emailid'];
		$query1="update appointments set status='app_cancel' where instructor_id=$tutorid and a_date='$date' and from_hour=$fhour and from_min=$fmins and from_period='$fperiod'";
		$res1=mysql_query($query1);
		}
	}
	}
	$cancleQuery="update tutor_schedule2 set status='cancelReq' where tutor_id=$tutorid and date_day='$date' and fhours=$fhour and fminutes=$fmins and fperiod='$fperiod'";
$res2=mysql_query($cancleQuery);
$upQuery="update tutor_request set status='accept' where tutorid=$tutorid and data='$date' and from_time like '%$fhour%' and from_time like '%$fmins%' and from_time like '%$fperiod%'";
 $res3=mysql_query($upQuery);

if($studentemail!=''){
$br=<<<BR
  hello\r\n
  Your Appointment has been cancelled due to some reasons, More Details below..\r\n 
  
  Date: $date.\r\n
  From Time: $from_time.\r\n
  To Time: $to_time.\r\n
BR;
$new=$br;
// Create the message
$message=Swift_Message::newInstance() ;
$message->setSubject('Acknowledgement');
// Set the From address 
$message->setFrom(array('stem.teamproject@gmail.com'=>"STEM"));
$message->setTo(array($studentemail, $tutoremail));
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
$transport->setUsername('stem.teamproject@gmail.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);
header("Location: tutor_Notifications.php");
}else{
$query1="update appointments set status='app_cancel' where ap.instructor_id=$tutorid and ap.a_date='$date' and ap.from_hour=$fhour and ap.from_min=$fmins and ap.from_period='$fperiod'";
$res1=mysql_query($query1);
header("Location: tutor_Notifications.php");
}
}
else{
$tutorid=$_REQUEST['tutorid'];
$date=$_REQUEST['date'];
$from_time=$_REQUEST['from_time'];
$to_time=$_REQUEST['to_time'];
$sql="delete from tutor_request where tutorid='$tutorid'";
$res=mysql_query($sql);
$tutor_email='';
$sql1="select emailid from tutor where tutor_id=$tutorid";
$res1=mysql_query($sql1);
if($row=mysql_fetch_array($res1)){
$tutor_email=$row['emailid'];
}
$br=<<<BR
  hello\r\n
  Your class cancellation request has been rejected please take the appointment\r\n 
  Date: $date.\r\n
  From Time: $from_time.\r\n
  To Time: $to_time.\r\n
BR;
$new=$br;
// Create the message
$message=Swift_Message::newInstance() ;
$message->setSubject('Acknowledgement');
// Set the From address 
$message->setFrom(array('stem.teamproject@gmail.com'=>"STEM"));
$message->setTo(array($tutor_email));
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
$transport->setUsername('stem.teamproject@gmail.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);	
header("Location: tutor_Notifications.php");
}
?>

