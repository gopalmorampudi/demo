<?php
include 'dbconnection.php';
require_once('lib/swift_required.php');
 $tqid=$_REQUEST['id'];
 $sub_name=$_REQUEST['stdName'];
 $email=$_REQUEST['emailid'];
 $content=$_REQUEST['content'];
 $qry="UPDATE course_notifications SET status='Request Sends' WHERE id=$tqid";
 $res=mysql_query($qry);
if($res){
	$br=<<<BR
  Hello\r\n
  can any one interested to take this appointment,\r\n 
  Student Name: $sub_name.\r\n
  Subject Details: $content.\r\n
BR;
$new=$br;
// Create the message
$message=Swift_Message::newInstance() ;
//var_dump($message);
$message->setSubject('Acknowledgement');
// Set the From address 
$message->setFrom(array($email=>"STEM"));
// Set the To addresses
$sql="select * from tutor";
$res=mysql_query($sql);
$tutorarray=array();
while($tutorres=mysql_fetch_assoc($res)) {
$tutorarray[] = $tutorres;
}
if(!empty($tutorarray)){
foreach ($tutorarray as $tutor) {
$message->setTo($tutor["emailid"]);
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
$transport->setUsername('stem.teamproject@gmail.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);
}
}
$_SESSION['flag']='mailSent';
header("Location:student_course_notifications.php");
}else{
	$_SESSION['flag']='mailSendingFailed';
header("Location:student_course_notifications.php?fail");
} 
?>