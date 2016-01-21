<?php
include 'dbconnection.php';
$subject_id=$_REQUEST['subject_id'];
$sql="delete from subject where subject_id='$subject_id'";
$res=mysql_query($sql);
if($res){
header('Location: view_subject.php?mesg=success');
}else{
header('Location: view_subject.php?mesg=fail');
}
?>