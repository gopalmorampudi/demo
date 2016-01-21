<?php
session_start();
include("dbconnection.php");
$action=$_REQUEST['action'];
if($action=='admin_login'){

$username=$_REQUEST['username'];

$password=($_REQUEST['password']);

$checkquery="SELECT * from admin where username='$username' && password='$password'";
$checkresults=mysql_query($checkquery);
if(mysql_num_rows($checkresults)>0){

if(!empty($_REQUEST['username']))
{
unset($_SESSION['adminuser']);
}
$_SESSION['adminuser']=$_REQUEST['username'];
header('Location: appointments.php');
}else{
header('Location: index.php?log=fail');
}
}


if($action=='tutor_login'){

$username=$_REQUEST['username'];

$password=($_REQUEST['password']);

$checkquery="SELECT * from tutor where emailid='$username' && password='$password'";
$checkresults=mysql_query($checkquery);
if($res=mysql_fetch_array($checkresults)){

if(!empty($_REQUEST['username']))
{
unset($_SESSION['tutor_email']);
}
$_SESSION['tutor_email']=$_REQUEST['username'];
$_SESSION['tutor_id']=$res[0];
header('Location: tutor_homepage.php?log=sucess');
}else{
header('Location: tutor_login_form.php?log=fail');
}
}

if($action=='student_login'){

$username=$_REQUEST['username'];

$password=($_REQUEST['password']);

$checkquery="SELECT * from student where emailid='$username' && password='$password'";
$checkresults=mysql_query($checkquery);
if($res=mysql_fetch_array($checkresults)>0){

if(!empty($_REQUEST['username']))
{
unset($_SESSION['student_email']);
}
$_SESSION['student_email']=$_REQUEST['username'];
$_SESSION['student_id']=$res[0];
header('Location: student_homepage.php');
}else{
header('Location: student_login_form.php?log=fail');
}
}


?>