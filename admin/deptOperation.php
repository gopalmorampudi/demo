<?php
session_start();
include 'dbconnection.php';
$action=$_REQUEST['action'];
//Update subjects
if($action=='update_dept'){
$dept_id=$_REQUEST['dept_id'];
$dept_name=strtoupper($_REQUEST['dept_name']);
$dept_id=$_REQUEST['dept_id'];
echo $sql="UPDATE `departments` SET `dept_name`='$dept_name' WHERE dept_id='$dept_id'";
  $res=mysql_query($sql);
if($res){
header('Location: view_dept.php?mesg=success');
}else{
header('Location: view_dept.php?mesg=fail');
}  
}
//Delete subjects
if($action=='deptdelete'){
$dept_id=$_REQUEST['dept_id'];
$sql="delete from departments where dept_id='$dept_id'";
$res=mysql_query($sql);
if($res){
header('Location: view_dept.php?mesg=success');
}else{
header('Location: view_dept.php?mesg=fail');
}
}
?>