<?php
session_start();
include 'dbconnection.php';
require_once('lib/swift_required.php');
//common action for all inserting
$action=$_REQUEST['action'];
//Insert subject...
if($action=='new_subject'){
$subject=strtoupper($_POST['subject']);	
$id=$_POST['id'];
$dept=strtoupper($_POST['dept']);
$sql="insert into subject(subject_name,course_id,dept_id)values('$subject','$id','$dept')";
$result=  mysql_query($sql);
if($result)
{
header('Location: view_subject.php?mesg=success');
}
else{
$_SESSION['exist']="existed";
header('Location: add_subjects_form.php');
}
}
else if($action=='new_dept'){
$dept=strtoupper($_POST['dept']);	
$id=$_POST['id'];
$sql="insert into departments(dept_name,dept_id)values('$dept','$id')";
$result=  mysql_query($sql);
if($result)
{
header('Location: view_dept.php?success');
}
else{
$_SESSION['exist']="existed";	
header('Location: add_department.php');
}
}
//insert tutor details----Tutor Registration
if($action=='insert_tutor_reg'){
	$tutorname=$_REQUEST['tutorname'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['pwd'];
	$phone=$_REQUEST['phno'];
	$address=$_REQUEST['address'];
	$subject=$_REQUEST['subject'];
	$sub=implode(',',$subject);
	$hours_count=$_REQUEST['hours'];
	$days_count=$_REQUEST['days'];
		
	$sql="insert into tutor(tutor_name,emailid,password,phone_number,address,subject,working_hours,working_days) values('$tutorname','$email','$password','$phone','$address','$sub','$hours_count','$days_count')";
	$res=mysql_query($sql);
	if($res){
		 echo "sucesss";
			}else{
		echo "fail";
	}
}

//view tutor profile
if($action=='tutor_profile'){
	?>
<html>
<body>
<center>
<h1>Tutor Profile</h1></center><br>
<table border="1" align="center">
<tr>
<th>TUTOR ID</th>
<th>TUTOR NAME</th>
<th>EMAIL ID</th>
<th>PHONE NUMBER</th>
<th>ADDRESS</th>
<th>Subject</th>
<th>Working Hours</th>
<th>Working Days</th>
<th></th>
</tr>
<?php

	$tutor_email=$_SESSION['tutor_email'];
	$sql="select tutor_id,tutor_name,emailid,phone_number,address,subject,working_hours,working_days from tutor where emailid='$tutor_email'";
	
	$res=mysql_query($sql);
	while($rs=mysql_fetch_array($res)){
	?>	
	<tr>
	<td><?=$rs[0]?></td>
	<td><?php echo $rs[1]?></td>
	<td><?php echo $rs[2]?></td>
	<td><?php echo $rs[3]?></td>
	<td><?php echo $rs[4]?></td>
	
	<td>
	<?php
		$nestedSql='select subject_name from subject where subject_id in('.$rs[5].')';
		$nestedRes=mysql_query($nestedSql);
		while($result=mysql_fetch_array($nestedRes)){
				echo $result[0].'<br>';
		}
	?>
	</td>
	<td><?php echo $rs[6]?></td>
	<td><?php echo $rs[7]?></td>
	<td>
	<a href="edit_tutor_profile.php?sno=<?=$rs[0]?>">EDIT</a>	
	</td>
	</tr>
<?php	
	}
}

//tutor update profile
if($action=='update_profile'){
	$tutor_id=$_REQUEST['tutor_id'];
	$tutorname=$_REQUEST['tutorname'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phno'];
	$address=$_REQUEST['address'];
	$subject=$_REQUEST['subject'];
	$sub=implode(',',$subject);
	$hours=$_REQUEST['hours'];
	$days=$_REQUEST['days'];
		
	$sql="update tutor set tutor_name='$tutorname',emailid='$email',phone_number='$phone',address='$address',subject='$sub',working_hours='$hours',working_days='$days' where tutor_id='$tutor_id'";
	 $res=mysql_query($sql);
	if($res){
		 echo "sucesss";
			}else{
		echo "fail";
	}
}

//Accept tutor by Admin
if($action=='accept_tutor'){
	$tutor_id=$_REQUEST['tutor_id'];
	$sql="update tutor set status='Accept' where tutor_id='$tutor_id'";
	$res=mysql_query($sql);
	if($res){
		 header('Location: tutor_request.php?mesg=success');
			}else{
		header('Location: tutor_request.php?mesg=fail');
	}
}

//Reject tutor by Admin
if($action=='reject_tutor'){
	$tutor_id=$_REQUEST['tutor_id'];
	$sql="update tutor set status='Reject' where tutor_id='$tutor_id'";
	$res=mysql_query($sql);
	if($res){
		 header('Location: tutor_request.php?mesg=success');
			}else{
		header('Location: tutor_request.php?mesg=fail');
	}
}

//Accept Student by Admin
if($action=='accept_student'){
	$student_id=$_REQUEST['student_id'];
	$sql="update student set status='Accept' where student_id='$student_id'";
	$res=mysql_query($sql);
	if($res){
		 header('Location: student_request.php?mesg=success');
			}else{
		header('Location: student_request.php?mesg=fail');
	}
}

//Reject Student by Admin
if($action=='reject_student'){
	$student_id=$_REQUEST['student_id'];
	$sql="update student set status='Reject' where student_id='$student_id'";
	$res=mysql_query($sql);
	if($res){
		 header('Location: student_request.php?mesg=success');
			}else{
		header('Location: student_request.php?mesg=fail');
	}
}

//Accept Student course request
if($action=='accept_student_course_request'){
		$schedule_id=$_REQUEST['schedule_id'];	
	$sql="update tutor_student_classes set status='schedule' where id='$schedule_id'";
	$res=mysql_query($sql);
	if($res){
		 header('Location: student_course_request.php?mesg=success');
			}else{
		header('Location: student_course_request.php?mesg=fail');
	}
}

//Reject Student course Request
if($action=='reject_student_course_request'){
	$schedule_id=$_REQUEST['schedule_id'];	
	$sql="delete from tutor_student_classes where id='$schedule_id'";
	$res=mysql_query($sql);
	if($res){
		 header('Location: student_course_request.php?mesg=success');
			}else{
		header('Location: student_course_request.php?mesg=fail');
	}
}


//insert schedule details of tutor
if($action=='tutor_schedule'){
$phone=$_REQUEST['phno'];
	$address=$_REQUEST['address'];
	$subject=$_REQUEST['subject'];
	$sub=implode(',',$subject);
	
	$sql="insert into tutor_schedule(tutor_name,emailid,password,phone_number,address,subject) values('$tutorname','$email','$password','$phone','$address','$sub')";
	$res=mysql_query($sql);
	if($res){
		 echo "sucesss";
			}else{
		echo "fail";
	}	
}

//Insert Student...
if($action=='new_student'){
	$student_name=$_REQUEST['student_name'];
	$emailid=$_REQUEST['emailid'];
	$password=$_REQUEST['password'];
	$phone_number=$_REQUEST['phone_number'];
	$address=$_REQUEST['address'];
	
$query="insert into student(student_name,emailid,password,phone_number,address)values('$student_name','$emailid','$password','$phone_number','$address')";
$result=  mysql_query($query);
if($result)
{
	echo "ss";
}
else{
	echo "ff";
}
}

//Update subjects
if($action=='update_subject'){
    $subject_id=$_REQUEST['subject_id'];
	$subject_name=$_REQUEST['subject_name'];
	$sql="update subject set subject_name='$subject_name' where subject_id='$subject_id'";
	$res=mysql_query($sql);
	if($res){
		
		header('Location: view_subject.php?mesg=success');
	}else{
		header('Location: view_subject.php?mesg=fail');
	}
}

//Update student...
if($action=='update_student'){
    $student_id=$_REQUEST['student_id'];
	$student_name=$_REQUEST['student_name'];
	$emailid=$_POST['emailid'];	
	$phone_number=$_POST['phone_number'];
	$address=$_POST['address'];
	$sql="update student set student_name='$student_name',phone_number='$phone_number',address='$address' where student_id='$student_id'";
	$res=mysql_query($sql);
	if($res){
		echo 'sss';
	}else{
		echo 'fff';
	}
}

//View student profile
if($action=='student_profile'){
?>
<center>
<h1>Student Profile</h1></center><br>
<table border="1" align="center">
<tr>
<th>Student ID</th>
<th>Student Name</th>
<th>Email ID</th>
<th>Mobile</th>
<th>Address</th>
<th>Operations </th>
</tr>

<?php
$student_email=$_SESSION['student_email'];
$sql="select * from student where emailid='$student_email'";
$res=mysql_query($sql);
if($student=mysql_fetch_assoc($res)) {
?>		
<tr>
<td><?=$student['student_id']?></td>
<td><?=$student['student_name']?></td>
<td><?=$student['emailid']?></td>
<td><?=$student['phone_number']?></td>
<td><?=$student['address']?></td>
<td>
	<a href="update_student_profile.php?student_id=<?=$student['student_id']?>" class="btn btn-primary">Edit</a>	
</td>
</tr>
<?php
}
}

//Schedule_tutor-timings
if($action=='schedule_tutor_timings'){
$tutor_email=$_SESSION['tutor_email'];
$tutor_id=$_SESSION['tutor_id'];

$subject=$_REQUEST['subject'];
$from_time=$_REQUEST['from_time'];
$to_time=$_REQUEST['to_time'];

$week_day=$_REQUEST['week_day'];
$week_day1=implode(',',$week_day);
echo count($week_day);

$tutor_id=$_SESSION['tutor_id'];
$sql1="select t.working_days from tutor t where t.tutor_id='$tutor_id'";
$result=mysql_query($sql1);
 if($res=mysql_fetch_row($result)){
	 $rs=$res[0];
	 if(count($week_day)<=$rs){

$sql="insert into tutor_schedule(tutor_id,subject_id,from_time,to_time,week_days)values('$tutor_id','$subject','$from_time','$to_time','$week_day1')";
$res1=mysql_query($sql);
	if($res1){
		 $_SESSION['flag']='success';
		 header('Location: schedule_form.php?action=schedule');
			}else{
		$_SESSION['flag']='failed';
		 header('Location: schedule_form.php?action=schedule');
	}
}else{
		$_SESSION['flag']='failed';
		 header('Location: schedule_form.php?action=schedule');
}
}
}

 //tutor_change_password
 
 if($action=='tutor_change_password')
 {
	$tutor_email=$_SESSION['tutor_email'];	

	 $oldpassword=$_POST['oldpassword'];
		$newpassword=$_POST['newpassword'];
		$confpassword=$_POST['confpassword'];
		$query="select * from tutor where password='$oldpassword' and emailid='$tutor_email'";
		$results=mysql_query($query);
		while($row=mysql_fetch_array($results))
		{
			echo $password=$row['password'];	
		}
		if($password==$oldpassword)
		{
			if($newpassword==$confpassword)
			{
				echo $update="update tutor set password='$confpassword' where password='$oldpassword' and emailid='$tutor_email'";
				$run=mysql_query($update);
				header('Location: changepassword.php?res=success');	
			}else{
				header('Location: changepass.php?npsw_cpsw=failure');
			}
		}else{
			header('Location: changepass.php?current=failure');
		}
 }
 
 // student_change_password
 else if($action=='student_change_password')
 {	
		$student_email=$_SESSION['student_email'];
		$oldpassword=$_POST['oldpassword'];
		$newpassword=$_POST['newpassword'];
		$confpassword=$_POST['confpassword'];
		$query="select * from student where password='$oldpassword' and emailid='$student_email'";
		$results=mysql_query($query);
		while($row=mysql_fetch_array($results))
		{
			echo $password=$row['password'];	
		}
		if($password==$oldpassword)
		{
			if($newpassword==$confpassword)
			{
				echo $update="update student set password='$confpassword' where password='$oldpassword' and emailid='$student_email'";
				$run=mysql_query($update);
				header('Location: changepass.php?res=success');	
			}else{
				header('Location: changepass.php?npsw_cpsw=failure');
			}
		}else{
			header('Location: changepass.php?current=failure');
		}
 }
 
 //admin_change_password
 else if($action=='change_password')
 {
    	$adminuser=$_SESSION['adminuser'];
	    $oldpassword=$_POST['oldpassword'];
		$newpassword=$_POST['newpassword'];
		$confpassword=$_POST['confpassword'];
		$query="select * from admin where password='$oldpassword' and username='$adminuser'";
		$results=mysql_query($query);
		while($row=mysql_fetch_array($results))
		{
			echo $password=$row['password'];	
		}
		if($password==$oldpassword)
		{
			if($newpassword==$confpassword)
			{
				echo $update="update admin set password='$confpassword' where password='$oldpassword' and username='$adminuser'";
				$run=mysql_query($update);
				header('Location: changepass.php?action=admin&res=success');	
			}else{
				header('Location: changepass.php?action=admin&res=failure');
			}
		}else{
			header('Location: changepass.php?action=admin&res=failure');
		}
	}
 

 
//complaint
if($action=='complaint'){
 
  $emailid=$_REQUEST['emailid'];
 $subject_name=$_REQUEST['subject'];
 $tutor_name=$_REQUEST['tutor'];
 $description=$_REQUEST['description'];
	
 $sql="insert into complaint(emailid,subject_name,tutor_name,description) values('$emailid','$subject_name','$tutor_name','$description')";
 $res=mysql_query($sql);
	if($res){
		header('Location: complaint.php?success');
			}else{
		header('Location: complaint.php?fail');
	}	
}


//reply by mail
if($action=='reply'){
require_once('lib/swift_required.php');
$admin_user=$_SESSION['adminuser'];

  $complaint_id=$_REQUEST['complaint_id'];
 $emailid=$_REQUEST['emailid'];
 $subject_name=$_REQUEST['subject_name'];
 $tutor_name=$_REQUEST['tutor_name'];
 $description=$_REQUEST['description'];
 $reply=$_REQUEST['reply'];
  $sql="update complaint set reply='$reply',replied_by='$admin_user',status='Replied' where complaint_id='$complaint_id'";
$res=mysql_query($sql);
	$sql1="";
	$res1=mysql_query($sql1);
if($res)
{
$br=<<<BR
 \r\n\r\n\r\n
BR;
 $new='Subject Name:-'.$subject_name.$br.'Tutor Name:-'.$tutor_name.$br.'Description:-'.$description.$br.'Reply:-'.$reply.$br.'Replied by:-'.$admin_user.$br;

// Create the message

$message=Swift_Message::newInstance() ;

$message->setSubject('Enquiry Information');

// Set the From address 

$message->setFrom(array($emailid=>"Enquiry"));

// Set the To addresses

$message->setTo(array($emailid=>''));

//Give it a body
$message->setBody($new);

$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');

$transport->setUsername('stem.teamproject@gmail.com');

$transport->setPassword('stem@123');

$mailer=Swift_Mailer::newInstance($transport);

$result=$mailer->send($message);	
header("Location: view_complaint.php?res=secces");
}else
{
header("Location: view_complaint.php?res=fail"); 
}
}



if($action=='student_view_subject'){
?>

<center><h3>View Subjects</h3></center><br>

<tr>
<td>Subject Name</td>
<td>
<select name="subject" onChange="showTutor(this);">
<option value="">Select subject</option>

	<?php
	$sql="select * from subject";
	$result=mysql_query($sql);
	while($res=mysql_fetch_array($result)){
	?>
	<option value="<?=$res['subject_id']?>"><?=$res['subject_name']?></option>
	<?php
	}
}
?>
 <script src="jquery-1.9.0.min.js"></script>
<script>
 function showTutor(sel) {
                        var subject_id = sel.options[sel.selectedIndex].value;
                        $("#output1").html("");
                        $("#output2").html("");
                        if (subject_id.length > 0) {

                            $.ajax({
                                type: "GET",
                                url: "fetch_tutor.php",
                                data: "subject_id=" + subject_id,
                                cache: false,
                                beforeSend: function() {
                                    $('#output1').html();
                                },
                                success: function(html) {
                                    $("#output1").html(html);
                                }
                            });
                        }
                    }

					 
</script>

  <!-- Place this tag after the last widget tag. -->
<script type="text/javascript">
                                (function() {
                                    var po = document.createElement('script');
                                    po.type = 'text/javascript';
                                    po.async = true;
                                    po.src = 'https://apis.google.com/js/platform.js';
                                    var s = document.getElementsByTagName('script')[0];
                                    s.parentNode.insertBefore(po, s);
                                })();
</script>
</select>
</td>
</tr>
</form>
<tr>
                            <td align="center" height="50">
                            <div id="output1"></div> </td>
                        </tr>
                        <tr>
                            <td align="center" height="50">
                            	<div id="output2"></div> </td>
                        </tr>
						
						<tr>
						<td></td>
						<td></td>
						</tr>
						
						<tr>
						<td></td>
						<td></td>
						</tr>
<?php						
if($action=='tutor_schedule1'){
$tutor_id=$_REQUEST['tutor_id'];
?>
<table border="1" align="center">
<tr>
<th>Schedule_id</th>
<th>Tutor ID</th>
<th>subject_id</th>
<th>from_time</th>
<th>to_time</th>
<th>week_days</th>
<th>status</th>
</tr>
<?php
if ($tutor_id <> "") {
$sql = "SELECT * FROM tutor_schedule WHERE tutor_id ='$tutor_id'";
$res=mysql_query($sql);
if($rs=mysql_fetch_array($res)) {
?>		
<tr>
<td><?=$rs['schedule_id']?></td>
<td><?=$rs['tutor_id']?></td>
<td><?=$rs['subject_id']?></td>
<td><?=$rs['from_time']?></td>
<td><?=$rs['to_time']?></td>
<td><?=$rs['week_days']?></td>
<td><?=$rs['status']?></td>
</tr>
<?php
}
}
}


//contact Us
if($action=='contactus'){
require_once('lib/swift_required.php');
$customer_name=$_REQUEST['customer_name'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['phone_number'];
$description=$_REQUEST['description'];
 echo $query="insert into contact(customer_name,email,phone,description)values('$customer_name','$email','$phone','$description')";
$res=mysql_query($query);
if($res)
{
$br=<<<BR
 \r\n\r\n\r\n
BR;
$new='Name:-'.$customer_name.$br .$email.$br.'Cell:-'.$phone.$br.'Description:-'.$description.$br.'Contact Details';

// Create the message

$message=Swift_Message::newInstance() ;
//var_dump($message);

$message->setSubject('Enquiry Information');

// Set the From address 

$message->setFrom(array($email=>"Enquiry"));

// Set the To addresses

$message->setTo(array('nukesh.smts@gmail.com'=> $customer_name.''));

//Give it a body
$message->setBody($new);

$transport=Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl');

$transport->setUsername('ticketraisingsystem@gmail.com');

$transport->setPassword('ticket12345');

$mailer=Swift_Mailer::newInstance($transport);

$result=$mailer->send($message);	
echo "secces";
}else
{
	echo "fail";
}
}

//admin view complaints 
if($action=='view_complaint'){
?>
<table border="1" align="center">
<tr>
<th>Complaint ID</th>
<th>Email ID</th>
<th>Subject Name</th>
<th>Tutor Name</th>
<th>Description</th>
</tr>

<?php
$sql = "select * from complaint where status='pending'";
$res=mysql_query($sql);
while($rs=mysql_fetch_array($res)) {
?>		
<tr>
<td><?=$rs['complaint_id']?></td>
<td><?=$rs['emailid']?></td>
<td><?=$rs['subject_name']?></td>
<td><?=$rs['tutor_name']?></td>
<td><?=$rs['description']?></td>
<td><button type='submit' name="reply" value="<?=$rs['complaint_id']?>">Reply</button></td>
</tr>
<?php
}
}

//check schedule
if ($action=='check_schedule') {
	
$schedule_id=$_REQUEST['schedule_id'];
$tutor_id=$_REQUEST['tutor_id'];
$subject_id=$_REQUEST['subject_id'];
$date=$_REQUEST['date'];
$time=$_REQUEST['time'];	
	
echo $sql = "select count(*) as count from tutor_student_classes t where t.tutor_id='$tutor_id' and t.subject_id='$subject_id' and t.date_selected='$date' and t.time_selected='$time' and t.`status`='schedule'";
echo $res=mysql_query($sql);
if($rs=mysql_fetch_array($res)){
	if($rs['count']==1){
		$_SESSION['msg']='failure';
		header("Location: student_course_request.php?res=failure");
	}else{
		$_SESSION['msg']='Success';
		header("Location: insert_data1.php?action=accept_student_course_request&schedule_id=$schedule_id");
	}
}  
}
?>
</table>
</body>
</html>




