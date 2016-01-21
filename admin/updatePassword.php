<?php
session_start();
include 'dbconnection.php';
$adminuser=$_SESSION['adminuser'];
$oldpassword=$_POST['oldpassword'];
$newpassword=$_POST['newpassword'];
$confpassword=$_POST['confpassword'];
$query="select * from admin where password='$oldpassword' and username='$adminuser'";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
$update="update admin set password='$confpassword' where password='$oldpassword' and username='$adminuser'";
$run=mysql_query($update);
$_SESSION['flag']='success';
header('Location: changepass.php?success');	
}
else{
$_SESSION['flag']='pwdwrong';	
header("Location: changepass.php");
}
?>