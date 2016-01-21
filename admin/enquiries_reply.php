<?php
include 'dbconnection.php';
require_once('lib/swift_required.php');
 $id=$_REQUEST['id'];
 $customer_name=$_REQUEST['customer_name'];
$email=$_REQUEST['email'];
$reply=$_REQUEST['reply'];

$sql="update contact set `status`='replied' where contact_id=$id";
$res=mysql_query($sql);

$br=<<<BR
  Hello Mr/Mrs.$customer_name\r\n
	\t$reply\r\n
  \t\t\t Thank you for contacting us...\r\n\n\n
  Replied by:Admin
BR;
$new=$br;
$message=Swift_Message::newInstance() ;
$message->setSubject('Acknowledgement');
$message->setFrom(array('stem.teamproject@gmail.com'=>"STEM"));
$message->setTo(array($email =>"STEM"));
$message->setBody($new);
$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');
$transport->setUsername('stem.teamproject@gmail.com');
$transport->setPassword('stem@123');
$mailer=Swift_Mailer::newInstance($transport);
$mailer->send($message);

header("Location:enquiries.php");
?>